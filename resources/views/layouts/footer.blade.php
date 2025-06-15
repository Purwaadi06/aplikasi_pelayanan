</div>
<footer class="d-footer">
    <div class="flex items-center justify-between gap-3 flex-wrap">
        <p class="mb-0 text-neutral-600">
            <script>
                document.write(`${new Date().getFullYear()} &copy Sistem Pelayanan Surat Kelurahan Cikundul.`);
            </script>
        </p>

    </div>
</footer>
</main>

<!-- jQuery library js -->
<script src="{{ asset('template') }}/assets/js/lib/jquery-3.7.1.min.js"></script>
<!-- Apex Chart js -->
<script src="{{ asset('template') }}/assets/js/lib/apexcharts.min.js"></script>
<!-- Data Table js -->
{{-- <script src="{{ asset('template') }}/assets/js/lib/simple-datatables.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Iconify Font js -->
<script src="{{ asset('template') }}/assets/js/lib/iconify-icon.min.js"></script>
<!-- jQuery UI js -->
<script src="{{ asset('template') }}/assets/js/lib/jquery-ui.min.js"></script>
<!-- Vector Map js -->
<script src="{{ asset('template') }}/assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
<script src="{{ asset('template') }}/assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
<!-- Popup js -->
<script src="{{ asset('template') }}/assets/js/lib/magnifc-popup.min.js"></script>
<!-- Slick Slider js -->
<script src="{{ asset('template') }}/assets/js/lib/slick.min.js"></script>
<!-- prism js -->
<script src="{{ asset('template') }}/assets/js/lib/prism.js"></script>
<!-- file upload js -->
<script src="{{ asset('template') }}/assets/js/lib/file-upload.js"></script>
<!-- audio player -->
<script src="{{ asset('template') }}/assets/js/lib/audioplayer.js"></script>

<script src="{{ asset('template') }}/assets/js/flowbite.min.js"></script>
<script src="https://cdn.datatables.net/1.13.11/js/jquery.dataTables.min.js"></script>
<!-- main js -->
<script src="{{ asset('template') }}/assets/js/app.js"></script>

<script src="{{ asset('template') }}/assets/js/homeOneChart.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

<script>
    function setupNumberFormatting() {
        console.log('terpanggil')
        // Format initial values when page loads
        $('.format-number').each(function() {
            // Skip if already initialized to prevent double formatting
            if ($(this).data('initialized')) return;

            // Mark as initialized
            $(this).data('initialized', true);

            // Get the initial value from the input
            let initialValue = $(this).val();
            let hiddenField = $(this).data('hidden-target');

            if (initialValue !== '') {
                // Check if the value contains both dots and commas
                let hasDot = initialValue.includes('.');
                let hasComma = initialValue.includes(',');

                let rawValue, formattedValue;

                // Case: Input value uses dot as thousand separator (Indonesian format: "11.200")
                if (hasDot && !hasComma) {
                    // Convert to raw value (remove dots)
                    rawValue = initialValue.replace(/\./g, '');

                    // Format for display (already in Indonesian format)
                    formattedValue = parseInt(rawValue, 10).toLocaleString('id-ID');
                }
                // Case: Input value uses comma as decimal separator (e.g., "4,5")
                else if (hasComma && !hasDot) {
                    // Split by comma for decimal handling
                    let parts = initialValue.split(',');

                    // Convert to raw value (dot as decimal separator)
                    if (parts.length > 1) {
                        rawValue = parts[0].replace(/\./g, '') + '.' + parts[1];
                    } else {
                        rawValue = parts[0].replace(/\./g, '');
                    }

                    // Format for display (Indonesian format)
                    if (parts.length > 1) {
                        let integerPart = parseInt(parts[0].replace(/\./g, ''), 10).toLocaleString('id-ID');
                        formattedValue = integerPart + ',' + parts[1];
                    } else {
                        formattedValue = parseInt(parts[0].replace(/\./g, ''), 10).toLocaleString('id-ID');
                    }
                }
                // Case: Input value contains both dots and commas (e.g., "4.455,2")
                else if (hasDot && hasComma) {
                    // Assuming dots are thousand separators and comma is decimal separator
                    // This is the Indonesian format
                    let parts = initialValue.split(',');
                    if (parts.length > 1) {
                        rawValue = parts[0].replace(/\./g, '') + '.' + parts[1];
                        let integerPart = parseInt(parts[0].replace(/\./g, ''), 10).toLocaleString('id-ID');
                        formattedValue = integerPart + ',' + parts[1];
                    } else {
                        rawValue = parts[0].replace(/\./g, '');
                        formattedValue = parseInt(parts[0].replace(/\./g, ''), 10).toLocaleString('id-ID');
                    }
                }
                // Case: Simple number without separators
                else {
                    rawValue = initialValue;
                    formattedValue = parseInt(initialValue, 10).toLocaleString('id-ID');
                }

                // Set the raw value to the hidden input (without dot/comma for whole numbers)
                if (rawValue.indexOf('.') === -1) {
                    $(hiddenField).val(rawValue);
                } else {
                    $(hiddenField).val(rawValue); // Keep decimal point for decimal numbers
                }

                // Set the formatted value for display
                $(this).val(formattedValue);
            }
        });

        // Remove previous event handlers to prevent duplicates
        $('.format-number').off('keypress').off('input');

        // Prevent disallowed characters from being entered
        $('.format-number').on('keypress', function(e) {
            // Allow only numbers, comma, and period
            const allowedChars = /[0-9,\.]/;
            const char = String.fromCharCode(e.which);

            // If the character is not allowed, prevent default action
            if (!allowedChars.test(char)) {
                e.preventDefault();
                return false;
            }

            // Check for multiple commas (allow only one)
            if (char === ',' && $(this).val().includes(',')) {
                e.preventDefault();
                return false;
            }
        });

        // Handle input changes (for formatting)
        $('.format-number').on('input', function(e) {
            let currentValue = $(this).val();
            let hiddenField = $(this).data('hidden-target');
            let cursorPosition = this.selectionStart;

            // Store the cursor position for later restoration
            let cursorOffset = 0;

            // Check if a comma is already present in the input
            let commaIndex = currentValue.indexOf(',');
            let hasComma = commaIndex !== -1;

            // If comma exists, prevent any dots after the comma position
            if (hasComma) {
                let beforeComma = currentValue.substring(0, commaIndex);
                let afterComma = currentValue.substring(commaIndex + 1).replace(/\./g, '');
                currentValue = beforeComma + ',' + afterComma;

                // Adjust cursor position if we're after the comma and removed dots
                if (cursorPosition > commaIndex) {
                    // Count dots that would have been removed before cursor
                    let dotsRemoved = 0;
                    let afterCommaBeforeCursor = currentValue.substring(commaIndex + 1, cursorPosition);
                    for (let i = 0; i < afterCommaBeforeCursor.length; i++) {
                        if (afterCommaBeforeCursor[i] === '.') dotsRemoved++;
                    }
                    cursorOffset -= dotsRemoved;
                }
            }

            // Only allow one comma in the input
            if (currentValue.split(',').length > 2) {
                // Keep only the first comma
                let parts = currentValue.split(',');
                currentValue = parts[0] + ',' + parts.slice(1).join('');

                // Adjust cursor position if needed
                if (cursorPosition > currentValue.length) {
                    cursorOffset = currentValue.length - cursorPosition;
                }
            }

            // Allow digits, comma, and periods (for thousand separators)
            let cleanValue = currentValue.replace(/[^0-9,.]/g, '');

            // Convert to raw value for the hidden input
            let rawValue;
            if (hasComma) {
                // For decimal values
                let parts = cleanValue.split(',');
                let integerPart = parts[0].replace(/\./g, '');
                let decimalPart = parts[1] || '';
                rawValue = integerPart + (decimalPart ? '.' + decimalPart : '');
            } else {
                // For whole numbers
                rawValue = cleanValue.replace(/\./g, '');
            }

            // Update hidden input with raw value
            $(hiddenField).val(rawValue);

            // Format display value (Indonesian format)
            if (cleanValue !== '') {
                if (hasComma) {
                    // Split by comma for decimal handling
                    let parts = cleanValue.split(',');

                    // Only format the integer part
                    if (parts[0] !== '') {
                        // Save length before formatting to calculate cursor position shift
                        let beforeLength = parts[0].length;
                        let integerPart = parts[0].replace(/\./g, '');

                        // If the integer part is a valid number, format it
                        if (integerPart !== '') {
                            let formattedInteger = parseInt(integerPart, 10).toLocaleString('id-ID');
                            let afterLength = formattedInteger.length;

                            // Calculate cursor adjustment if cursor is in the integer part
                            if (cursorPosition <= beforeLength) {
                                cursorOffset += (afterLength - beforeLength);
                            }

                            // Ensure no dots in decimal part
                            let formattedValue = formattedInteger + ',' + (parts[1] ? parts[1].replace(/\./g,
                                '') : '');
                            $(this).val(formattedValue);
                        } else {
                            $(this).val('0,' + (parts[1] ? parts[1].replace(/\./g, '') : ''));
                        }
                    } else {
                        $(this).val('0,' + (parts[1] ? parts[1].replace(/\./g, '') : ''));
                    }
                } else {
                    // For whole numbers
                    if (cleanValue.replace(/\./g, '') !== '') {
                        let beforeLength = cleanValue.length;
                        let formattedValue = parseInt(cleanValue.replace(/\./g, ''), 10).toLocaleString(
                            'id-ID');
                        let afterLength = formattedValue.length;

                        // Adjust cursor position based on the change in length
                        cursorOffset += (afterLength - beforeLength);

                        $(this).val(formattedValue);
                    }
                }

                // Restore cursor position with adjustment
                let newPosition = Math.max(0, Math.min(cursorPosition + cursorOffset, $(this).val().length));
                this.setSelectionRange(newPosition, newPosition);
            }
        });
    }
</script>

<script>
    function applyTailwindStyle() {
        $('.select2-container--classic .select2-selection--single')
            .addClass(
                'rounded-lg border border-gray-300 px-2.5 pt-4 pb-2.5 text-sm text-gray-900 dark:text-white bg-transparent focus:border-blue-600 dark:focus:border-blue-500'
            );

    }
    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    $('.filepond').filepond({
        acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
        labelFileTypeNotAllowed: 'Format file tidak didukung'
    });
    // FilePond.create(document.body);
    $('.filepond--credits').hide()
</script>
@yield('js')
@include('sweetalert::alert')
</body>

</html>
