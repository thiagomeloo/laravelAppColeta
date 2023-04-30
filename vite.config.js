import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';

const glob = require('glob');
const path = require('path');

/**
 * Pega os arquivos que serão compilados
 * 
 * @param {string} directory - pasta onde serao buscados
 * @param {Array<string>} extensions - extensoes que serao buscadas
 * @param {Array<string>} exclude - arquivos que serao excluidos
 * @returns 
 */
function getEntries(directory, extensions, exclude) {
    const entries = {};
    extensions = Array.isArray(extensions) ? extensions : [extensions];
    const files = glob.sync(`${directory}/**/*.+(${extensions.join('|')})`, {
        ignore: exclude
    });
    files.forEach((file) => {
        const staticPath = path.relative(directory, file);
        const entry = staticPath.replace(/\.(js|css)$/, '');

        if (exclude && exclude.includes(entry)) return;

        entries[entry] = path.resolve(__dirname, file);
    });
    return entries;

}


export default defineConfig({
    plugins: [
        laravel({
            input: getEntries('./resources', ['js', 'css']),
            refresh: true,
        }),
        tailwindcss('./tailwind.config.js')
    ],
});
