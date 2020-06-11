(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL =  {
        setupFormValidation: function() {
            //form validation rules
            $("#form1").validate({
                rules: {
                    usern: {
                        required: true,
                    },
                    passw: {
                        required: true,
						minlength: 5
                    },
                    alamat: {
                        required: true,
                    },
                    level: {
                        required: true,
                    },
                    nama_peng: {
                        required: true,
                    },
                    nama_gej: {
                        required: true,
                    },
                    nama_pen: {
                        required: true,
                    },
                    pil_cf_pen: {
                        required: true,
                    },
                    jum_pil_gej: {
                        required: true,
                    },
                    ket_pen: {
                        required: true,
                    },
                    cegah_pen: {
                        required: true,
                    },
                    tanggul_pen: {
                        required: true,
                    },
                    nama_user: {
                        required: true,
                    },
                    jk: {
                        required: true,
                    },
                    email: {
                        required: true,
						email: true,
                    },


                },
                messages: {
                    usern: {
                        required: "Username harus diisi",
                    },
                    passw: {
                        required: "Password harus diisi",
						minlength: "Sedikitnya 5 karakter"
                    },
                    alamat: {
                        required: "Alamat harus diisi",
                    },
                    level: {
                        required: "Level harus dipilih",
                    },
                    nama_peng: {
                        required: "Nama pengelola harus diisi",
                    },
                    nama_gej: {
                        required: "Nama gejala harus diisi",
                    },
                    nama_pen: {
                        required: "Nama penyakit harus diisi",
                    },
                    pil_cf_pen: {
                        required: "Nilai kepastian harus diisi",
                    },
                    ket_pen: {
                        required: "Keterangan harus diisi",
                    },
                    cegah_pen: {
                        required: "Pencegahan harus diisi",
                    },
                    tanggul_pen: {
                        required: "Penanggulangan harus diisi",
                    },
                    nama_user: {
                        required: "Nama harus diisi",
                    },
                    jk: {
                        required: "Jenis kelamin harus diisi",
                    },
                    email: {
                        required: "Email harus diisi",
						email: "Email belum benar",
                    },
					
					

                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
})(jQuery, window, document);