<?php include("../../config/config.php");?>
<?php include("modulobuscador.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php if($_POST) pdf_create($_POST['content'],"content"); ?>
<script type="text/javascript" src="<?php echo  $_SESSION['rutajs']; ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>
<?php Interfaz::PlantillaGenerica("buscador","test"); ?>