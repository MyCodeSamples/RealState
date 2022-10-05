!(function () {
    "use strict";
    var e = {};
    $(function () {
        var e = $(".datatables-users"),
            t = $(".select2"),
            a = baseUrl + "app/user/view/account",
            n = $("#offcanvasAddUser");
        if (t.length) {
            var s = t;
            s.wrap('<div class="position-relative"></div>').select2({ placeholder: "Select Country", dropdownParent: s.parent() });
        }
        if (($.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } }), e.length))
            var o = e.DataTable({
                processing: !0,
                serverSide: !0,
                ajax: { url: baseUrl + "user-list" },
                columns: [{ data: "" }, { data: "id" }, { data: "name" }, { data: "email" }, { data: "email_verified_at" }, { data: "action" }],
                columnDefs: [
                    {
                        className: "control",
                        searchable: !1,
                        orderable: !1,
                        responsivePriority: 2,
                        targets: 0,
                        render: function (e, t, a, n) {
                            return "";
                        },
                    },
                    {
                        searchable: !1,
                        orderable: !1,
                        targets: 1,
                        render: function (e, t, a, n) {
                            return "<span>".concat(a.fake_id, "</span>");
                        },
                    },
                    {
                        targets: 2,
                        responsivePriority: 4,
                        render: function (e, t, n, s) {
                            var o = n.name,
                                r = ["success", "danger", "warning", "info", "dark", "primary", "secondary"][Math.floor(6 * Math.random())],
                                i = (o = n.name).match(/\b\w/g) || [];
                            return (
                                '<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">' +
                                ('<span class="avatar-initial rounded-circle bg-label-' + r + '">' + (i = ((i.shift() || "") + (i.pop() || "")).toUpperCase()) + "</span>") +
                                '</div></div><div class="d-flex flex-column"><a href="' +
                                a +
                                '" class="text-body text-truncate"><span class="fw-semibold">' +
                                o +
                                "</span></a></div></div>"
                            );
                        },
                    },
                    {
                        targets: 3,
                        render: function (e, t, a, n) {
                            return '<span class="user-email">' + a.email + "</span>";
                        },
                    },
                    {
                        targets: 4,
                        className: "text-center",
                        render: function (e, t, a, n) {
                            var s = a.email_verified_at;
                            return "".concat(s ? '<i class="bx fs-4 bx-check-shield text-success"></i>' : '<i class="bx fs-4 bx-shield-x text-danger" ></i>');
                        },
                    },
                    {
                        targets: -1,
                        title: "Actions",
                        searchable: !1,
                        orderable: !1,
                        render: function (e, t, n, s) {
                            return (
                                '<div class="d-inline-block text-nowrap">' +
                                '<button class="btn btn-sm btn-icon edit-record" data-id="'.concat(n.id, '" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><i class="bx bx-edit"></i></button>') +
                                '<button class="btn btn-sm btn-icon delete-record" data-id="'.concat(n.id, '"><i class="bx bx-trash"></i></button>') +
                                '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href="' +
                                a +
                                '" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div>'
                            );
                        },
                    },
                ],
                order: [[2, "desc"]],
                dom:
                    '<"row mx-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                language: { sLengthMenu: "_MENU_", search: "", searchPlaceholder: "Search.." },
                buttons: [
                    {
                        extend: "collection",
                        className: "btn btn-label-secondary dropdown-toggle mx-3",
                        text: '<i class="bx bx-export me-2"></i>Export',
                        buttons: [
                            {
                                extend: "print",
                                title: "Users",
                                text: '<i class="bx bx-printer me-2" ></i>Print',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [2, 3],
                                    format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            var n = $.parseHTML(e),
                                                s = "";
                                            return (
                                                $.each(n, function (e, t) {
                                                    void 0 !== t.classList && t.classList.contains("user-name") ? (s += t.lastChild.textContent) : (s += t.innerText);
                                                }),
                                                s
                                            );
                                        },
                                    },
                                },
                                customize: function (e) {
                                    $(e.document.body).css("color", config.colors.headingColor).css("border-color", config.colors.borderColor).css("background-color", config.colors.body),
                                        $(e.document.body).find("table").addClass("compact").css("color", "inherit").css("border-color", "inherit").css("background-color", "inherit");
                                },
                            },
                            {
                                extend: "csv",
                                title: "Users",
                                text: '<i class="bx bx-file me-2" ></i>Csv',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [2, 3],
                                    format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            var n = $.parseHTML(e),
                                                s = "";
                                            return (
                                                $.each(n, function (e, t) {
                                                    t.classList.contains("user-name") ? (s += t.lastChild.textContent) : (s += t.innerText);
                                                }),
                                                s
                                            );
                                        },
                                    },
                                },
                            },
                            {
                                extend: "excel",
                                title: "Users",
                                text: "Excel",
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [2, 3],
                                    format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            var n = $.parseHTML(e),
                                                s = "";
                                            return (
                                                $.each(n, function (e, t) {
                                                    t.classList.contains("user-name") ? (s += t.lastChild.textContent) : (s += t.innerText);
                                                }),
                                                s
                                            );
                                        },
                                    },
                                },
                            },
                            {
                                extend: "pdf",
                                title: "Users",
                                text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [2, 3],
                                    format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            var n = $.parseHTML(e),
                                                s = "";
                                            return (
                                                $.each(n, function (e, t) {
                                                    t.classList.contains("user-name") ? (s += t.lastChild.textContent) : (s += t.innerText);
                                                }),
                                                s
                                            );
                                        },
                                    },
                                },
                            },
                            {
                                extend: "copy",
                                title: "Users",
                                text: '<i class="bx bx-copy me-2" ></i>Copy',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [2, 3],
                                    format: {
                                        body: function (e, t, a) {
                                            if (e.length <= 0) return e;
                                            var n = $.parseHTML(e),
                                                s = "";
                                            return (
                                                $.each(n, function (e, t) {
                                                    t.classList.contains("user-name") ? (s += t.lastChild.textContent) : (s += t.innerText);
                                                }),
                                                s
                                            );
                                        },
                                    },
                                },
                            },
                        ],
                    },
                    {
                        text: '<i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add New User</span>',
                        className: "add-new btn btn-primary",
                        attr: { "data-bs-toggle": "offcanvas", "data-bs-target": "#offcanvasAddUser" },
                    },
                ],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (e) {
                                return "Details of " + e.data().name;
                            },
                        }),
                        type: "column",
                        renderer: function (e, t, a) {
                            var n = $.map(a, function (e, t) {
                                return "" !== e.title ? '<tr data-dt-row="' + e.rowIndex + '" data-dt-column="' + e.columnIndex + '"><td>' + e.title + ":</td> <td>" + e.data + "</td></tr>" : "";
                            }).join("");
                            return !!n && $('<table class="table"/><tbody />').append(n);
                        },
                    },
                },
            });
        $(document).on("click", ".delete-record", function () {
            var e = $(this).data("id"),
                t = $(".dtr-bs-modal.show");
            t.length && t.modal("hide"),
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    customClass: { confirmButton: "btn btn-primary me-3", cancelButton: "btn btn-label-secondary" },
                    buttonsStyling: !1,
                }).then(function (t) {
                    t.value
                        ? ($.ajax({
                              type: "DELETE",
                              url: "".concat(baseUrl, "user-list/").concat(e),
                              success: function () {
                                  o.draw();
                              },
                              error: function (e) {
                                  console.log(e);
                              },
                          }),
                          Swal.fire({ icon: "success", title: "Deleted!", text: "The user has been deleted!", customClass: { confirmButton: "btn btn-success" } }))
                        : t.dismiss === Swal.DismissReason.cancel && Swal.fire({ title: "Cancelled", text: "The User is not deleted!", icon: "error", customClass: { confirmButton: "btn btn-success" } });
                });
        }),
            $(document).on("click", ".edit-record", function () {
                var e = $(this).data("id"),
                    t = $(".dtr-bs-modal.show");
                t.length && t.modal("hide"),
                    $("#offcanvasAddUserLabel").html("Edit User"),
                    $.get("".concat(baseUrl, "user-list/").concat(e, "/edit"), function (e) {
                        $("#user_id").val(e.id), $("#add-user-fullname").val(e.name), $("#add-user-email").val(e.email);
                    });
            }),
            $(".add-new").on("click", function () {
                $("#user_id").val(""), $("#offcanvasAddUserLabel").html("Add User");
            }),
            setTimeout(function () {
                $(".dataTables_filter .form-control").removeClass("form-control-sm"), $(".dataTables_length .form-select").removeClass("form-select-sm");
            }, 300);
        var r = document.getElementById("addNewUserForm"),
            i = FormValidation.formValidation(r, {
                fields: {
                    name: { validators: { notEmpty: { message: "Please enter fullname" } } },
                    email: { validators: { notEmpty: { message: "Please enter your email" }, emailAddress: { message: "The value is not a valid email address" } } },
                    userContact: { validators: { notEmpty: { message: "Please enter your contact" } } },
                    company: { validators: { notEmpty: { message: "Please enter your company" } } },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: function (e, t) {
                            return ".mb-3";
                        },
                    }),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    autoFocus: new FormValidation.plugins.AutoFocus(),
                },
            }).on("core.form.valid", function () {
                $.ajax({
                    data: $("#addNewUserForm").serialize(),
                    url: "".concat(baseUrl, "user-list"),
                    type: "POST",
                    success: function (e) {
                        o.draw(), n.offcanvas("hide"), Swal.fire({ icon: "success", title: "Successfully ".concat(e, "!"), text: "User ".concat(e, " Successfully."), customClass: { confirmButton: "btn btn-success" } });
                    },
                    error: function (e) {
                        n.offcanvas("hide"), Swal.fire({ title: "Duplicate Entry!", text: "Your email should be unique.", icon: "error", customClass: { confirmButton: "btn btn-success" } });
                    },
                });
            });
        n.on("hidden.bs.offcanvas", function () {
            i.resetForm(!0);
        });
        var l = document.querySelectorAll(".phone-mask");
        l &&
            l.forEach(function (e) {
                new Cleave(e, { phone: !0, phoneRegionCode: "US" });
            });
    });
    var t = window;
    for (var a in e) t[a] = e[a];
    e.__esModule && Object.defineProperty(t, "__esModule", { value: !0 });
})();
