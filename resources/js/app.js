import "./bootstrap";
import jQuery from "jquery";
window.$ = jQuery;
import blueimpLoadImage from "../../node_modules/blueimp-load-image/js/load-image";
import { document } from "postcss";

$(document).ready(function () {
    $("#toggleSidebar").click(function () {
        $("#sidebar").delay(2000).toggleClass("collapsed-bar");
        $("#toggleSidebar i").toggleClass(
            "bi-chevron-double-left bi-chevron-double-right"
        );
        $(this).toggleClass(
            "rounded-start-circle rounded-end-circle me-3 ms-0"
        );
        $("#buttonSidebar").toggleClass("col-1 col-7 bg-dark-4 w-25");
    });

    $("ul#tentang li button").click(function () {
        let idElemen = $(this).attr("id");
        $("h1#tentang").fadeOut("fast", function () {
            switch (idElemen) {
                case "aplikasi-tab":
                    $(this).html("Tentang Validasi Data Telkom").fadeIn("fast");
                    break;
                case "tujuan-tab":
                    $(this).html("Tujuan Validasi Data Telkom").fadeIn("fast");
                    break;
                case "fitur-tab":
                    $(this).html("Fitur Validasi Data Telkom").fadeIn("fast");
                    break;
                case "pengembang-tab":
                    $(this).html("Tim Pengembang").fadeIn("fast");
                    break;
                default:
                    $(this).html("Error").fadeIn("fast");
                    break;
            }
        });
    });

    $("#gambar").on("change", function (e) {
        console.log(e);
        const previewContainer = $("#image-preview");
        previewContainer.empty();
        const modalWidth = $("#input-foto-modal").width();
        const files = e.target.files;
        for (var i = 0; i < files.length; i++) {
            blueimpLoadImage(
                files[i],
                function (img) {
                    previewContainer.append(img);
                    img.classList.add("my-2");
                    img.classList.add("rounded-3");
                    img.classList.add("col-md-4");
                },
                {
                    maxWidth: modalWidth,
                    crop: true,
                    canvas: true,
                }
            );
        }
    });

    $(".tambahFotoButton").on("click", function () {
        const id = $(this).data("id");
        const modalId = $(this).data("modal-id");
        $("#tambahGambar" + modalId).on("change", function (e) {
            console.log(e);
            const previewContainer = $("#tambah-image-preview-" + modalId);
            previewContainer.empty();
            const modalWidth = $("#create-foto-modal-" + modalId).width();
            const files = e.target.files;
            for (var i = 0; i < files.length; i++) {
                blueimpLoadImage(
                    files[i],
                    function (img) {
                        previewContainer.append(img);
                        img.classList.add("my-2");
                        img.classList.add("rounded-3");
                        img.classList.add("col-md-4");
                    },
                    {
                        maxWidth: modalWidth,
                        crop: true,
                        canvas: true,
                    }
                );
            }
        });
    });

    $("#tambahButton").on("click", function () {
        $("#uploadForm").trigger("reset");
        $("#inputFotoModal2").on("shown.bs.modal", function () {
            $("#id_valins").focus();
        });
    });

    $(".editButton").on("click", function () {
        let gambarFile;
        const id = $(this).data("id");
        const modalId = $(this).data("modal-id");
        const gambarKe = $(this).data("gambar-ke");
        const baseUrl = "https://kp.test/";
        $("#gambar_edit_" + modalId).on("change", function (e) {
            console.log(e);
            const previewContainer = $("#image-preview-edit-" + modalId);
            const modalWidth = $("#input-foto-modal-edit-" + modalId).width();
            const files = e.target.files;
            for (var i = 0; i < files.length; i++) {
                blueimpLoadImage(
                    files[i],
                    function (img) {
                        previewContainer.empty();
                        previewContainer.append(img);
                    },
                    {
                        maxWidth: modalWidth,
                        crop: true,
                        canvas: false,
                    }
                );
            }
        });
        // Lakukan permintaan AJAX untuk mendapatkan data berdasarkan ID
        $.ajax({
            type: "GET",
            url: "/admin/dashboard/input_foto/" + id + "/edit",
            success: function (data) {
                const previewContainer = $("#image-preview-edit-" + modalId);
                switch (gambarKe) {
                    case 1:
                        gambarFile = data.gambar.gambar1;
                        break;
                    case 2:
                        gambarFile = data.gambar.gambar2;
                        break;
                    case 3:
                        gambarFile = data.gambar.gambar3;
                        break;
                    default:
                        gambarFile = null;
                }
                if (gambarFile) {
                    previewContainer.show();
                    // Tambahkan elemen <img> langsung ke dalam previewContainer
                    previewContainer.html(
                        '<img src="' +
                            baseUrl +
                            "storage/" +
                            gambarFile +
                            '" alt="Preview" class="img-fluid">'
                    );
                } else {
                    previewContainer.hide();
                }
                $("#id_valins_edit_" + modalId).val(data.id_valins);
                if (data.kondisi == true) {
                    $("#id_witel_edit_" + modalId).val(data.id_witel);
                    $("#id_rekon_edit_" + modalId).val(data.id_rekon);
                } else {
                    $("#id_witel_edit_" + modalId).val(data.witel);
                    $("#id_rekon_edit_" + modalId).val(data.rekon);
                }
                // Isi modal dengan data yang diterima dari server
            },
            error: function () {
                console.log("Error fetching data");
            },
        });
    });

    $("#pelurusanKeterangan").hide();
    $("#submitPelurusanButton").hide();

    $("#valinsButton #nok").on("click", function () {
        $("#pelurusanIDValins").hide();
        $("#valinsButton").removeClass("d-flex");
        $("#valinsButton").hide();
        $("#submitPelurusanButton").show();
        $("#submitPelurusanButton").addClass("d-flex");
        $("#pelurusanKeterangan").show();
        console.log("ok");
    });
});
