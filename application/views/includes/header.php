<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ahadith</title>
    
    <style type="text/css">
        a:link, .btn, .btn:focus {
            outline: none;
        }
        
        a.btn {
            line-height: 17px;
        }
    </style>
    
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
</head>
<body>
    <header>
        
        
        <!-- alert box -->
        <div id="alert_message_container">
            <div class="alert" id="alert_message" style="display: none;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><?php
                    
                    //$temp_message = $this->session->flashdata('message');
                    //
                    //if( isset( $message['type'] ) ):
                    //    echo $message['body'];
                    //   
                    //else:
                    //    echo $temp_message['body'];
                    //    
                    //endif;
                    
                ?></span>
            </div>&nbsp;
        </div>
    </header>
    
    <script type="text/javascript">
        function hide_alert() {
            $('#alert_message').fadeOut('slow');
        }
        
        $(document).ready(function () {
            if( $('#alert_message span').text() != '' ) {
                $('#alert_message').addClass('alert-<?php if( isset( $message['type'] ) ) echo $message['type']; else echo $temp_message['type']; ?>').show();
            }
            
            //dont timeout the alert only if $message['timeout'] is set to FALSE. default behaviour is that it will timeout
            <?php
                if( !isset( $message['timeout'] ) OR (isset( $message['timeout'] ) AND $message['timeout'] == TRUE) ):
                    echo 'setTimeout("hide_alert()", 12000);';
                endif;
            ?>
            
            //adjust the width of the typeahead autocomplete list, this will work for the whole project
            $('input[type="text"]').on("keypress", function() {
                var current = this;
                setTimeout(function() { $(current).next('ul.typeahead').css('width', $(current).width() + 'px'); }, 250);
            });
        });
    </script>
    
    <section id="main_body" class="container-fluid">
        