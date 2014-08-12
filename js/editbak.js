profFlag=true;
        $('#edit-prof').click(function(){

            if(profFlag){
                profFlag=false;
                var text = $('#profile').html();

                $('#profile').html('<textarea id="prof-text"> '+text+' </textarea><button id="prof-cancel" class="btn btn-danger pull-right">Cancel</button><button id="prof-save" class="btn btn-success pull-right">Save</button><br><br>');

                $("#prof-save").click(function(e) {
                    var educ_text = $('#prof-text').val(); 
                    educ_text = educ_text.replace("\n","<br><br>");
                    SaveProfile(educ_text, 'profile');
                    $('#profile').html(educ_text);
                    $("#prof-save").hide();
                    $("#prof-cancel").hide();
                    profFlag=true;
                });

                $("#prof-cancel").click(function(e) {
                    $('#profile').html(text);
                    $("#prof-save").hide();
                    $("#prof-cancel").hide();
                    profFlag=true;
                });

                $("#prof-text").mousemove(function(e) {
                    var myPos = $(this).offset();
                    myPos.bottom = $(this).offset().top + $(this).outerHeight();
                    myPos.right = $(this).offset().left + $(this).outerWidth();

                    if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                        $(this).css({ cursor: "nw-resize" });
                    }
                    else {
                        $(this).css({ cursor: "" });
                    }
                })
                .keyup(function(e) {
                    if (e.which == 8 || e.which == 46) {
                        $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
                    }
                    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                        $(this).height($(this).height()+1);
                    };
                });
            }

        });

        familyFlag=true;
        $('#edit-family').click(function(){

            if(familyFlag){
                familyFlag=false;
                var text = $('#family_background').html();

                $('#family_background').html('<textarea id="family-text"> '+text+' </textarea><button id="family-cancel" class="btn btn-danger pull-right">Cancel</button><button id="family-save" class="btn btn-success pull-right">Save</button><br><br>');

                $("#family-save").click(function(e) {
                    var family_text = $('#family-text').val(); 
                    family_text = family_text.replace("\n","<br><br>");
                    SaveProfile(family_text, 'family_background');
                    $('#family_background').html(family_text);
                    $("#family-save").hide();
                    $("#family-cancel").hide();
                    familyFlag=true;
                });

                $("#family-cancel").click(function(e) {
                    $('#family_background').html(text);
                    $("#family-save").hide();
                    $("#family-cancel").hide();
                    familyFlag=true;
                });

                $("#family-text").mousemove(function(e) {
                    var myPos = $(this).offset();
                    myPos.bottom = $(this).offset().top + $(this).outerHeight();
                    myPos.right = $(this).offset().left + $(this).outerWidth();

                    if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                        $(this).css({ cursor: "nw-resize" });
                    }
                    else {
                        $(this).css({ cursor: "" });
                    }
                })
                .keyup(function(e) {
                    if (e.which == 8 || e.which == 46) {
                        $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
                    }
                    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                        $(this).height($(this).height()+1);
                    };
                });
            }

        });

        educFlag=true;
        $('#edit-educ').click(function(){

            if(educFlag){
                educFlag=false;
                var text = $('#educational_background').html();
                
                $('#educational_background').html('<textarea id="educ-text"> '+text+' </textarea><button id="educ-cancel" class="btn btn-danger pull-right">Cancel</button><button id="educ-save" class="btn btn-success pull-right">Save</button><br><br>');

                $("#educ-save").click(function(e) {
                    var educ_text = $('#educ-text').val(); 
                    educ_text = educ_text.replace("\n","<br><br>");
                    SaveProfile(educ_text, 'educational_background');
                    $('#educational_background').html(educ_text);
                    $("#educ-save").hide();
                    $("#educ-cancel").hide();
                    educFlag=true;
                });

                $("#educ-cancel").click(function(e) {
                    $('#educational_background').html(text);
                    $("#educ-save").hide();
                    $("#educ-cancel").hide();
                    educFlag=true;
                });

                $("#educ-text").mousemove(function(e) {
                    var myPos = $(this).offset();
                    myPos.bottom = $(this).offset().top + $(this).outerHeight();
                    myPos.right = $(this).offset().left + $(this).outerWidth();

                    if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                        $(this).css({ cursor: "nw-resize" });
                    }
                    else {
                        $(this).css({ cursor: "" });
                    }
                })
                .keyup(function(e) {
                    if (e.which == 8 || e.which == 46) {
                        $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
                    }
                    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                        $(this).height($(this).height()+1);
                    };
                });
            }

        });

        careerFlag=true;
        $('#edit-career').click(function(){
            var text = $('#political_career').html();

            if(careerFlag){
                careerFlag=false;
                $('#political_career').html('<textarea id="career-text"> '+text+' </textarea><button id="career-cancel" class="btn btn-danger pull-right">Cancel</button><button id="career-save" class="btn btn-success pull-right">Save</button><br><br>');

                $("#career-save").click(function(e) {
                    var career_text = $('#career-text').val(); 
                    career_text = career_text.replace("\n","<br><br>");
                    SaveProfile(career_text, 'political_career');
                    $('#political_career').html(career_text);
                    $("#career-save").hide();
                    $("#career-cancel").hide();
                    careerFlag=true;
                });

                $("#career-cancel").click(function(e) {
                    $('#political_career').html(text);
                    $("#career-save").hide();
                    $("#career-cancel").hide();
                    careerFlag=true;
                });

                $("#career-text").mousemove(function(e) {
                    var myPos = $(this).offset();
                    myPos.bottom = $(this).offset().top + $(this).outerHeight();
                    myPos.right = $(this).offset().left + $(this).outerWidth();

                    if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                        $(this).css({ cursor: "nw-resize" });
                    }
                    else {
                        $(this).css({ cursor: "" });
                    }
                })
                .keyup(function(e) {
                    if (e.which == 8 || e.which == 46) {
                        $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
                    }
                    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                        $(this).height($(this).height()+1);
                    };
                });
            }

        });

        advoFlag=true;
        $('#edit-advo').click(function(){

            if(advoFlag){
                advoFlag=false;
                var text = $('#advocacies').html();

                $('#advocacies').html('<textarea id="advo-text"> '+text+' </textarea><button id="advo-cancel" class="btn btn-danger pull-right">Cancel</button><button id="advo-save" class="btn btn-success pull-right">Save</button><br><br>');

                $("#advo-save").click(function(e) {
                    var advo_text = $('#advo-text').val(); 
                    advo_text = advo_text.replace("\n","<br><br>");
                    SaveProfile(advo_text, 'advocacies');
                    $('#advocacies').html(advo_text);
                    $("#advo-save").hide();
                    $("#advo-cancel").hide();
                    advoFlag=true;
                });

                $("#advo-cancel").click(function(e) {
                    $('#advocacies').html(text);
                    $("#advo-save").hide();
                    $("#advo-cancel").hide();
                    advoFlag=true;
                });

                $("#advo-text").mousemove(function(e) {
                    var myPos = $(this).offset();
                    myPos.bottom = $(this).offset().top + $(this).outerHeight();
                    myPos.right = $(this).offset().left + $(this).outerWidth();

                    if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                        $(this).css({ cursor: "nw-resize" });
                    }
                    else {
                        $(this).css({ cursor: "" });
                    }
                })
                .keyup(function(e) {
                    if (e.which == 8 || e.which == 46) {
                        $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
                    }
                    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                        $(this).height($(this).height()+1);
                    };
                });
            }

        });

        contactFlag=true;
        $('#edit-contact').click(function(){

            if(contactFlag){
                contactFlag=false;
                var text = $('#contact_info').html();

                $('#contact_info').html('<textarea id="contact-text"> '+text+' </textarea><button id="contact-cancel" class="btn btn-danger pull-right">Cancel</button><button id="contact-save" class="btn btn-success pull-right">Save</button><br><br>');

                $("#contact-save").click(function(e) {
                    var contact_text = $('#contact-text').val(); 
                    contact_text = contact_text.replace("\n","<br><br>");
                    SaveProfile(contact_text, 'contact_info');
                    $('#contact_info').html(contact_text);
                    $("#contact-save").hide();
                    $("#contact-cancel").hide();
                    contactFlag=true;
                });

                $("#contact-cancel").click(function(e) {
                    $('#contact_info').html(text);
                    $("#contact-save").hide();
                    $("#contact-cancel").hide();
                    contactFlag=true;
                });

                $("#contact-text").mousemove(function(e) {
                    var myPos = $(this).offset();
                    myPos.bottom = $(this).offset().top + $(this).outerHeight();
                    myPos.right = $(this).offset().left + $(this).outerWidth();

                    if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                        $(this).css({ cursor: "nw-resize" });
                    }
                    else {
                        $(this).css({ cursor: "" });
                    }
                })
                .keyup(function(e) {
                    if (e.which == 8 || e.which == 46) {
                        $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
                    }
                    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                        $(this).height($(this).height()+1);
                    };
                });
            }

        });

        sourcesFlag=true;
        $('#edit-sources').click(function(){
            
            if(sourcesFlag){
                sourcesFlag=false;
                var text = $('#sources').html();

                $('#sources').html('<textarea id="sources-text"> '+text+' </textarea><button id="sources-cancel" class="btn btn-danger pull-right">Cancel</button><button id="sources-save" class="btn btn-success pull-right">Save</button><br><br>');

                $("#sources-save").click(function(e) {
                    var sources_text = $('#sources-text').val(); 
                    sources_text = sources_text.replace("\n","<br><br>");
                    SaveProfile(sources_text, 'sources');
                    $('#sources').html(sources_text);
                    $("#sources-save").hide();
                    $("#sources-cancel").hide();
                    sourcesFlag=true;
                });

                $("#sources-cancel").click(function(e) {
                    $('#sources').html(text);
                    $("#sources-save").hide();
                    $("#sources-cancel").hide();
                    sourcesFlag=true;
                });

                $("#sources-text").mousemove(function(e) {
                    var myPos = $(this).offset();
                    myPos.bottom = $(this).offset().top + $(this).outerHeight();
                    myPos.right = $(this).offset().left + $(this).outerWidth();

                    if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                        $(this).css({ cursor: "nw-resize" });
                    }
                    else {
                        $(this).css({ cursor: "" });
                    }
                })
                .keyup(function(e) {
                    if (e.which == 8 || e.which == 46) {
                        $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
                    }
                    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                        $(this).height($(this).height()+1);
                    };
                });
            }

        });

        articlesFlag=true;
        $('#edit-articles').click(function(){

            if(articlesFlag){
                articlesFlag=false;
                var text = $('#articles').html();

                $('#articles').html('<textarea id="articles-text"> '+text+' </textarea><button id="articles-cancel" class="btn btn-danger pull-right">Cancel</button><button id="articles-save" class="btn btn-success pull-right">Save</button><br><br>');

                $("#articles-save").click(function(e) {
                    var articles_text = $('#articles-text').val(); 
                    articles_text = articles_text.replace("\n","<br><br>");
                    SaveProfile(articles_text, 'articles');
                    $('#articles').html(articles_text);
                    $("#articles-save").hide();
                    $("#articles-cancel").hide();
                    articlesFlag=true;
                });

                $("#articles-cancel").click(function(e) {
                    $('#articles').html(text);
                    $("#articles-save").hide();
                    $("#articles-cancel").hide();
                    articlesFlag=true;
                });

                $("#articles-text").mousemove(function(e) {
                    var myPos = $(this).offset();
                    myPos.bottom = $(this).offset().top + $(this).outerHeight();
                    myPos.right = $(this).offset().left + $(this).outerWidth();

                    if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                        $(this).css({ cursor: "nw-resize" });
                    }
                    else {
                        $(this).css({ cursor: "" });
                    }
                })
                .keyup(function(e) {
                    if (e.which == 8 || e.which == 46) {
                        $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
                    }
                    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                        $(this).height($(this).height()+1);
                    };
                });
            }
        });