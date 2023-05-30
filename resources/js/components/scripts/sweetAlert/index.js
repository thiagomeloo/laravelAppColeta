import Swal from "sweetalert2"

export function SweetAlertComponent() {

    return {
        basic: {
            neutral: function (title, text, icon = null) {
                const options = {
                    title: title,
                    text: text,
                    confirmButtonText: 'Ok'
                }

                if (icon != null) {
                    options.icon = icon;
                }

                return Swal.fire(options);
            },
            success: function (title, text) {
                return this.neutral(title, text, 'success');
            },
            error: function (title, text) {
                return this.neutral(title, text, 'error');
            },
            warning: function (title, text) {
                return this.neutral(title, text, 'warning');
            },
            info: function (title, text) {
                return this.neutral(title, text, 'info');
            },
        },
        advanced: {
            neutral: 'neutral',
            success: 'success',
            error: 'error',
            warning: 'warning',
            info: 'info',
        }
    }

}
