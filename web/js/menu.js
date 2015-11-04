/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {


                    $(".res").click(function () {
                        $(".menu > ul > li").slideToggle();
                        $("#wrapper > div:nth-child(2) > div.res").css("display","block");
                        $("#wrapper > div:nth-child(2) > ul").css("display","block");
                        $( "#wrapper > div:nth-child(2) > div.res" ).text( "Kontak-podmenu" );
                    });


                    $(window).resize(function () {
                        var current_width = $(window).width();
                        if (current_width >= 483) {
                            $(".menu > ul > li").removeAttr("style");
                            $("#wrapper > div:nth-child(2) > div.res").removeAttr("style");
                        $("#wrapper > div:nth-child(2) > ul").removeAttr("style");

                        } 
                            });
                    
                    });