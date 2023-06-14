
<!-- JavaScript code -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>


<div class="modal fade" id="scan-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-6">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Scan Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-12">
                    <div id="reader"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel"
                    onclick="stopCamera()">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // AddMasterdata button click event handler
        $(document).on('click', '#AddMasterdata', function(e) {
            e.preventDefault();
            $('#scan-modal').modal('show');
        });

        // QR code scanner initialization
        var video = document.getElementById('video-preview');
        var cameraId;

        Html5Qrcode.getCameras()
            .then(devices => {
                if (devices && devices.length) {
                    cameraId = devices[0].id;
                    // cameraAction(cameraId);
                    const html5QrCode = new Html5Qrcode("reader", {
                        formatsToSupport: [Html5QrcodeSupportedFormats.QR_CODE]
                    });
                    console.log("Kamera akan siap");
                    const config = {
                        fps: 10,
                        qrbox: {
                            width: 300,
                            height: 250
                        }
                    };
                    html5QrCode.start(
                            cameraId,
                            config,
                            (decodedText, decodedResult) => {
                                html5QrCode.stop()
                                    .then(() => {
                                        var data = decodedText;
                                        console.log("Terdeteksi");
                                        $("#scan-modal").modal("hide");
                                        $("#item_code").val(
                                            data
                                        ); // Mengirim data ke elemen input dengan id "item_code"
                                    })
                                    .catch((err) => {
                                        console.warn("Terdeteksi");
                                    });
                            },
                            (errorMessage) => {
                                // parse error, ignore it.
                            })
                        .catch((err) => {
                            console.error(err);
                        });

                }
            })
            .catch(err => {
                console.warn("Kamera bermasalah, cek izin kamera");
            });

        //button cancel modal
        function stopCamera() {
            html5QrCode.stop()
                .then(() => {
                    console.log("Pemindaian QR code dihentikan");
                })
                .catch((err) => {
                    console.error("Gagal menghentikan pemindaian QR code:", err);
                });
        }

    });
</script>
