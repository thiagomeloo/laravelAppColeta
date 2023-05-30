<textarea {{ $attributes->merge(['class' => 'resize-none overflow-hidden min-h-[50px]']) }}
    blade-component-textarea-autoresize>{{ $slot }}</textarea>

@push('scripts')
    <script>
        {
            const textarea = document.querySelector('[blade-component-textarea-autoresize]');

            const adjustHeight = () => {
                textarea.style.height = 'auto';
                textarea.style.height = `${textarea.scrollHeight}px`;
            }

            textarea.addEventListener('input', adjustHeight);
            adjustHeight()
        }
    </script>
@endpush
