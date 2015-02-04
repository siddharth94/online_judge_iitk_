<!doctype html>
<html>
    <head>
        <title><?php echo $title.' | ' ; ?>Online Judge IIT Kanpur</title>
        <script  src="<?php echo base_url(); ?>scripts/jquery.js"></script>   
        <script type="text/javascript" src="<?php echo base_url();?>scripts/script.js"></script> 
        <script type="text/javascript" src="<?php echo base_url();?>scripts/modules.js"></script>         
        <script type="text/javascript" src="<?php echo base_url();?>scripts/ajax_login.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>scripts/admin.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>scripts/submission.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>scripts/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>scripts/jquery_ui.js"></script>
        <link rel="shortcut icon" href="<?php echo base_url();?>images/online_judge.ico" />
<!-- <?php
	// echo (ini_set('upload_tmp_dir','/var/www/online_judge_iitk/onj/backend/tmp_upload'));
	echo "hello"; ?> -->
  

        <script> 
        tinymce.init({
            selector: "textarea.rich",
            theme: "modern",
            //width: 300,
            height: 350,
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
            plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                 "save table contextmenu directionality template paste textcolor"
           ],
           content_css: "css/content.css",
           toolbar: "insertfile undo redo | styleselect fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
           style_formats: [
                //{title: "Wrap", block: 'p', styles: {word-wrap:break-word},
                {title: 'Span tag', inline: 'span', styles: {color: '#000000'}},
                {title: 'Heading 1', block: 'h1', styles: {color: '#000000'}},
                {title: 'Heading 2', block: 'h2', styles: {color: '#000000'}},
                {title: 'Heading 3', block: 'h3', styles: {color: '#000000'}},
                {title: 'Heading 4', block: 'h4', styles: {color: '#000000'}},
                {title: 'Heading 5', block: 'h5', styles: {color: '#000000'}},
                {title: 'Heading 6', block: 'h6', styles: {color: '#000000'}},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
         }); 
        </script>


        <script src="<?php echo base_url(); ?>styles/javascript/semantic.js"></script>
        <link type="text/css" href="<?php echo base_url(); ?>styles/css/semantic.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url();?>styles/css/styles.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url();?>styles/css/date_min.css" rel="stylesheet" />
    </head>
    
