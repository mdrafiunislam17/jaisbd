@extends("admin.layouts.master")
@section("title", "Announcements")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Announcements</h1>
            <a href="{{ route("admin.announcements") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-sync fa-sm text-white-50"></i> Refresh</a>
        </div>

        @if (session()->has("success"))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("success") }}
            </div>
        @endif

        @if (session()->has("error"))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("error") }}
            </div>
        @endif

        <div id="alert-message">
            <!-- For JS Response -->
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" id="form">
                    @csrf
                    <div class="row mb-2">
                        <div class="d-flex w-100 justify-content-end bg-light py-3">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100" id="send-email-btn"><i
                                            class="fa fa-envelope"></i> Email Send
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="designation">Choose Members</label>
                                <select name="designation" id="designation" class="form-control">
                                    <option value="">Choose...</option>
                                    <option value="Convener">Convener</option>
                                    <option value="Joint convener">Joint convener</option>
                                    <option value="Advisory Council">Advisory Council</option>
                                    <option value="Member">Member</option>
                                    <option value="All">All Member</option>
                                </select>
                            </div>

                            <p>Total selected members: <strong id="total-members">0</strong></p>
                            <div class="form-group" id="members">
                                <!-- For JS Response -->
                            </div>

                            <p class="text-danger" id="loading-members"><!-- For JS Response --></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#message',  // Use textarea as the editor
            height: 500,           // Set the height of the editor
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
            menubar: false,
        });

        jQuery(document).ready(function () {
            const total_members_element = jQuery("#total-members");
            const members_element = jQuery("#members");
            const loading_members_element = jQuery("#loading-members");
            const send_email_btn_element = jQuery("#send-email-btn");

            const sendButtonDisabled = () => {
                send_email_btn_element.prop("disabled", true);
            }

            const sendButtonEnable = () => {
                send_email_btn_element.prop("disabled", false);
            }

            sendButtonDisabled();

            const memberCounter = () => {
                const member_checkbox_element = jQuery(".member-checkbox");
                const designation_checkbox_element = jQuery(".designation-checkbox");

                if (member_checkbox_element.length) {
                    member_checkbox_element.on("change", function () {
                        let total = 0;

                        member_checkbox_element.each(function () {
                            if (jQuery(this).prop("checked")) {
                                total++;
                            }
                        });

                        total_members_element.text(total);

                        if (total) {
                            sendButtonEnable();
                        } else {
                            sendButtonDisabled();
                        }
                    });
                }

                if (designation_checkbox_element.length) {
                    designation_checkbox_element.on("change", function () {
                        const id = jQuery(this).val();

                        if (jQuery(this).prop("checked") === true) {
                            member_checkbox_element.each(function (i) {
                                jQuery(`#member_${id}_${i}`).prop("checked", true);
                            });
                        } else {
                            member_checkbox_element.each(function (i) {
                                jQuery(`#member_${id}_${i}`).prop("checked", false);
                            });
                        }

                        let total = 0;

                        member_checkbox_element.each(function () {
                            if (jQuery(this).prop("checked")) {
                                total++;
                            }
                        });

                        total_members_element.text(total);

                        if (total) {
                            sendButtonEnable();
                        } else {
                            sendButtonDisabled();
                        }
                    });
                }
            }

            // Find Members
            jQuery("#designation").on("change", function () {
                const designation = jQuery(this).val();

                members_element.html('');
                total_members_element.text('0');

                if (!designation) {
                    return;
                }

                jQuery.ajax({
                    url: "{{ route("admin.announcements.ajax_members") }}",
                    data: {designation: designation},
                    method: "GET",
                    beforeSend: function () {
                        loading_members_element.text("Please wait...");
                    },
                    success: function (json) {
                        loading_members_element.text('');
                        let total = 0;

                        if (json.length) {
                            const html1 = json.map((item1, index1) => {
                                const designation = item1["designation"];
                                const data = item1["data"];

                                let html2 = data.map((item2, index2) => {
                                    if (item2) {
                                        total++;
                                    }
                                    return `<label for="member_${index1}_${index2}" class="d-block">
                                        <input type="checkbox" class="member-checkbox" value="${item2["member"]["email_address"]}" name="members[]" id="member_${index1}_${index2}" checked> ${item2["member"]["member_name"]}
                                    </label>`;
                                }).join("");

                                let label = `<label for="designation_${index1}" class="d-block text-primary mt-4">
                                        <input type="checkbox" class="designation-checkbox" value="${index1}" id="designation_${index1}" checked> <strong>${designation} (${data.length})</strong>
                                    </label>`;

                                return label + html2;
                            });

                            total_members_element.text(total);
                            members_element.html(html1);

                            memberCounter();
                            sendButtonEnable();
                        }
                    }
                });
            });

            // Send Email
            jQuery("#form").submit(function (e) {
                e.preventDefault();
                const form = jQuery(this);

                const subject = form.find('input[name="subject"]').val().trim();
                const message = form.find('textarea[name="message"]').val().trim();

                if (subject === "" || message === "") {
                    alert("Subject and message are required.");
                    return;
                }

                jQuery.ajax({
                    url: "{{ route("admin.announcements.ajax_email_send") }}",
                    method: "POST",
                    data: form.serialize(),
                    beforeSend: function() {
                        send_email_btn_element.html('<i class="fa fa-spinner fa-spin"></i> Email Sending');
                        send_email_btn_element.prop("disabled", true);
                    },
                    success: function (json) {
                        send_email_btn_element.html('<i class="fa fa-envelope"></i> Email Sending');
                        send_email_btn_element.prop("disabled", false);

                        if (json.success) {
                            form[0].reset();
                            total_members_element.text('0');
                            members_element.html('');

                            jQuery("#alert-message").html(`<div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    <strong>${json.message}</strong>
                                    <p class="mb-0">${json.sent}</p>
                               </div>`);
                        } else {
                            if (json.error) {
                                const errorMessages = json.error.map(item => {
                                    return `<p class="p-0 m-0">${item.message}</p>`;
                                }).join("");

                                jQuery("#alert-message").html(`<div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    <h4 class="alert-heading">${json.message}</h4>
                                    ${errorMessages}
                                    <hr>
                                    <p class="mb-0">${json.sent}</p>
                               </div>`);
                            } else {
                                jQuery("#alert-message").html(`<div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    ${json.message}
                               </div>`);
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle AJAX error, if any
                        console.error("AJAX Error:", error);
                    }
                });

            });
        });
    </script>
@endpush
