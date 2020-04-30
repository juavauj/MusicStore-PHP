// jquery facilita la transicion mediante su funcion toggle
$(".message a").click(
    () => {
        $(".form-registration").toggle("slow");
        $(".form-login").toggle("slow");
    }
);