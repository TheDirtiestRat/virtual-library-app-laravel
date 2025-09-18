@extends('layout.app')

@section('content')
    <div class="p-4 h-screen w-screen">
        <div class="basis-full flex flex-col gap-4 h-full w-full">
            <div class="bg-white rounded-xl shadow p-4 basis-auto flex flex-row justify-between items-center">
                <div class="">
                    <h1 class="text-2xl font-semibold">
                        @yield('title-Page')
                    </h1>
                    <p class="text-gray-600">
                        @yield('page-Description')
                    </p>
                </div>

                <a href="{{ url('/books/manage') }}"
                    class="shadow rounded-xl p-3 hover:bg-gray-100 focus:outline-2 basis-auto">Back</a>
            </div>
            <div class=" h-full basis-full flex flex-row gap-4">
                {{-- content --}}
                @yield('page-content')
            </div>
            <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
        </div>

        @include('components.alert')

        <script type="module">
            // check if isbn exists in the database
            $(document).ready(function() {
                $('#isbn-exists').click(function() {
                    let isbn = $('#isbn').val().trim();
                    if (isbn === '') {
                        confirmAction("Please enter an ISBN number.", "Error");
                        // alert('Please enter an ISBN number.');
                        return;
                    }

                    $.ajax({
                        url: '{{ url('/books/api/') }}/' + isbn,
                        method: 'GET',
                        success: function(response) {
                            // console.log(response)
                            if (response.totalItems == 0) {
                                confirmAction("The listed ISBN is not listed in the online database or Invalid ISBN entered.", "Error");
                                return
                            }

                            const volumeInfo = response.items[0].volumeInfo;
                            const searchInfo = response.items[0].searchInfo;

                            // confirmAction("ISBN exists in the database. Do you want to use this information?");
                            fillFormWithGoogleBooksData(volumeInfo);

                            // console.log(response.items[0]);
                        },
                        error: function() {
                            // alert('Error checking ISBN. Please try again later.');
                            confirmAction("Error checking ISBN. Please try again later.", "Error");
                        }
                    });
                });
            });

            // fill the input forms
            function fillFormWithGoogleBooksData(volumeInfo) {
                $('#title').val(volumeInfo.title || '');
                // $('#subtitle').val(subtitle || '');
                $('#authors').val((volumeInfo.authors || []).join(', '));
                $('#publisher').val(volumeInfo.publisher || '');

                if (isCompleteDate(volumeInfo.publishedDate)) {
                    $('#publication_date').val(volumeInfo.publishedDate);
                    console.log("Date is valid")
                } else {
                    let p_date = `${volumeInfo.publishedDate}-01-01`
                    $('#publication_date').val(p_date);
                    console.log(p_date)
                }
                $('#categories').val(volumeInfo.categories || '');
                $('#page_count').val(volumeInfo.pageCount || '');
                $('#description').val(volumeInfo.description || '');
                $('#isbn').val((volumeInfo.industryIdentifiers || []).find(id => id.type === 'ISBN_13')?.identifier || '');

                console.log(volumeInfo);
            }

            function isCompleteDate(dateString) {
                // Regex to check if the string is only a four-digit year
                const yearOnlyRegex = /^\d{4}$/;

                if (yearOnlyRegex.test(dateString)) {
                    return false; // It's only a year
                }

                // Attempt to parse the string as a Date
                const date = new Date(dateString);

                // Check if the Date object is valid (not 'Invalid Date')
                // and if it actually parsed a full date (not just a year that defaulted to Jan 1st)
                return !isNaN(date.getTime()) && dateString.includes('-') || dateString.includes('/') || dateString.includes(
                    ' ');
            }

            $('#publication_date').change(function() {
                var inputValue = $(this).val();
                console.log('Input value changed to: ' + inputValue);
                // Perform other actions here
            });
        </script>
        <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    @endsection
