


                
            </div>
            <footer class="footer"> Horário de atendimento: Segunda à sexta, das 10h às 18h e aos sábados das 10h às 17h. | <?=$this->site['titulo'];?></footer>
        </div>
    </div>
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script defer src=" https://use.fontawesome.com/releases/v5.0.6/js/all.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url();?>public/admin/plugins/bootstrap/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
    <script type="text/javascript" src="<?=base_url();?>public/js/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>public/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>public/js/jquery.flipster.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url();?>public/admin/js/jquery.slimscroll.js"></script>
    <!-- jquery-ui -->
    <script src="<?=base_url();?>public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url();?>public/admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url();?>public/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?=base_url();?>public/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url();?>public/admin/js/custom.min.js"></script>
    <script src="<?=base_url();?>public/admin/js/conta.js"></script>
     <!--c3 JavaScript -->
    <script src="<?=base_url();?>public/admin/plugins/d3/d3.min.js"></script>
    <script src="<?=base_url();?>public/admin/plugins/c3-master/c3.min.js"></script>
    <!-- Editor -->
    <script src="<?=base_url();?>public/admin/js/trumbowyg.js"></script>
    <script src="<?=base_url();?>public/admin/js/translations/pt-br.js"></script>
    <script type="text/javascript" src="<?=base_url();?>public/js/painel.js?v=2904"></script>
    <script>
        $('[classic-editor]').trumbowyg({
            btns: [['viewHTML'],
                ['undo', 'redo'],
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']],
            svgPath: '<?=base_url();?>public/admin/js/ui/icons/icons.svg',
            autogrow: true,
            resetCss: false,
            semantic: false
        });
            
    </script>
    <?php $this->load->view('site/conta/painel/default/modal',[]);?>
</body>

</html>

