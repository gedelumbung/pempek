/**
 * Initialization JQuery Events
 * 
 * @param  mixed  scope  scope element to be render
 */
fn.initEvents = function(scope) {
    var $$ = function(ele) {
        return $(ele, scope);
    };

    /** 
     * Input
     */
    // Format number
    // change value to formatted number on keyup
    $$("[num-format]").keyup(function(e) {
        var $this = $(this);
        var old_val = $this.val();
        var new_val = fn.format.num(old_val);

        if (old_val === new_val)
            return;

        $this.val(new_val);
    })
    .parents('form').submit(function() {
        $("[num-format]", this).each(function() {
            $(this).val($(this).val().replace(/(\,|\.0+)/g, ''));
        });
    })

    // Theme Input
    var plugin = {
        "common": ["PluginScrollToTop", "Nav", "StickyHeader"], 

        "datepicker": {
            selector: "[datepicker]",
            options: {
                format: "dd/mm/yyyy"
            },
            init: function(el, options) {
                if (el.data("datepicker"))
                    return;

                var input = el.clone();

                input.themePluginDatePicker(options);
                input.addClass("form-control")

                // adding calendar icon
                $("<div class='input-group'>")
                    .append(input)
                    .prepend("<span class='input-group-addon'><i class='fa fa-calendar'></i></span>")
                    .insertBefore(el);

                el.remove();
            }
        },
        "datepicker-range": {
            fn: "datepicker",
            selector: "[datepicker-range]",
            options: {
                format: "dd/mm/yyyy"
            },
            init: function(el, options) {
                if (el.data("datepicker"))
                    return;

                var ele = $("<div class='input-daterange input-group datepicker-range'>")

                ele.append("<span class='input-group-addon'><i class='fa fa-calendar'></i></span>")
                    .append("<input type='text' class='form-control' name='"+el.attr("name")+"[start]'>")
                    .append("<span class='input-group-addon'>to</span>")
                    .append("<input type='text' class='form-control' name='"+el.attr("name")+"[end]'>")
                    .insertBefore(el);

                el.remove();
                ele.themePluginDatePicker(options);
            }
        },
        "timepicker": {
            selector: "[timepicker]",
            options: {
                showMeridian: false,
            },
            init: function(el, options) {
                if (el.data("timepicker"))
                    return;
                
                var ele = $("<div class='input-group'>")
                var input = el.clone();

                input.themePluginTimePicker(options);
                input.addClass("form-control");

                // adding timer icon
                ele.append(input)
                    .prepend("<span class='input-group-addon'><i class='fa fa-clock-o'></i></span>")
                    .insertBefore(el);

                el.remove();
            }
        },
        "select2": {
            selector: "[select2]",
            fn: "themePluginSelect2",
            init: function(el, options) {
                el.addClass("form-control");
                el.themePluginSelect2(options);
            },
        },
        "switch": {
            selector: "[switch]",
            fn: "themePluginIOS7Switch",
        },
        "themePluginMaxLength": {
            selector: "[maxlength]",
        },
        "themePluginRevolutionSlider": {
            selector: "[data-plugin-revolution-slider]:not(.manual), .slider-container .slider:not(.manual)",
        },
        "themePluginCarousel": {
            selector: "[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)",
        },
        "themePluginSticky": {
            selector: "[data-plugin-sticky]:not(.manual)",
        },
    };

    for (var type in plugin) {
        var opt = plugin[type];

        switch (type) {
            case "common":
                for (var i in opt) {
                    if (typeof theme[opt[i]] !== 'undefined')
                        theme[opt[i]].initialize();
                }
                break;

            case "switch":
                if (typeof Switch !== 'undefined' && $.isFunction(Switch))
                    $$(opt.selector)[opt.fn]();
                break;

            default:
                var func = opt.fn || type;

                if ($.isFunction($.fn[func])) {
                    $$(opt.selector).each(function() {
                        var $this = $(this);
                        var options = $.extend(opt.options, $this.data('plugin-options'));

                        if ($.isFunction(opt.init))
                            opt.init($this, options);
                        else
                            $this[func](options);
                    });
                }
                break;
        }
    }

    /**
     * Validation
     */
    if (typeof Validator !== "undefined") {
        var v = {
            rules : {},

            validateInput: function(name, input) {
                var data = {};
                var rules = {};

                data[name] = input.val();
                rules[name] = this.rules[name];

                var validator = new Validator(data, rules);
                var isValid = validator.passes();

                var group = input.closest('.form-group');
                var msg = input.next(".help-block");

                if (msg.length == 0) {
                    msg = $("<p class='help-block'>").insertAfter(input);
                }

                // success
                if (isValid) {
                    group.removeClass('has-error').addClass('has-success');
                    msg.html("");
                }
                // fails
                else {
                    group.removeClass('has-success').addClass('has-error');
                    msg.html(validator.errors.first(name));
                }

                return isValid;
            },
        };

        $("form").each(function() {
            /*inputs*/
            var input = $("[rules]", this);

            // initializing input and collecting rules
            input.each(function() {
                var $this = $(this);
                var name = $this.attr("name");
                var rule = $this.attr("rules");

                v.rules[name] = rule;

                // adding star to required element
                if (rule.indexOf("required") !== -1) {
                    $this.closest(".form-group").find(".control-label").append("<b class='text-danger'> *</b>")
                }

                // on change validation
                $this.keyup(function() {
                    return v.validateInput(name, $this);
                });
            });

            /*Form*/
            // on submit validation
            $("form").submit(function(e) {
                var isValid = true;

                input.each(function() {
                    var $this = $(this);

                    isValid = v.validateInput(this.name, $this);

                    // validation fails
                    if (!isValid) {
                        $this.focus();
                        e.preventDefault();
                    }

                    return isValid;
                });
            })
        });
    }

    /** 
     * UI Element
     */
    // Datatables 
    $$('[datatable]').each(function() {
        var item = $(this);
        var url = item.attr("datatable");

        // non-ajax datatable
        var options = {
            bPaginate: item.attr("dt-paginate")!=="false",
            initComplete: function(settings, json) {
                fn.initEvents(item);
            },
        };

        if (fn.empty(url))
            return $(this).DataTable(options);

        // ajax datatable
        var column = [];

        item.find("[dt-field]").each(function() {
            var $this = $(this);
            var name = $this.attr("dt-field");

            column.push({
                data: name,
                name: name,
                bSearchable: $this.attr("sort")!=="false",
                bSortable: $this.attr("search")!=="false",
            });
        })

        item.DataTable($.extend(options, {
            processing: true,
            serverSide: true,
            ajax: url,
            columns: column
        }));
    });

    // Modal
    $$("[modal],[modal-sm],[modal-md],[modal-lg]").click(function(e) {
        // must left button
        if (e.which != 1)
            return true;
        
        var button = $(this);
        var content = button.attr('modal-content') || '.page-content';
        var title = button.attr('modal-title') || $("title").text();
        var href = button.attr("href");

        // size
        var sizeSet = ["modal","modal-sm","modal-md","modal-lg"];

        for (var i in sizeSet) {
            // attribute is exists
            if (button.attr(sizeSet[i])!==undefined) {
                var target = $(button.attr(sizeSet[i]) || '#modal-basic');
                
                // set modal size
                if (sizeSet[i]!='modal')
                    $(".modal-dialog", target).addClass(sizeSet[i]);
                break;
            }
        }

        target.find(".modal-title").html(title);
        target.modal("show");

        if (href != undefined) {
            var body = target.find(".modal-body");
            var loading = $("#img-loading").clone();

            loading.removeAttr("id");
            loading.css({"margin-top": "100px"});
            body.html($("<div class='text-center' style='min-height:300px'>").append(loading));

            $.ajax({
                url: href,
                success: function(res) {
                    var content = $(res).find(content);

                    if (content.length == 0)
                        content = $(res);

                    // recompile angular if exists
                    if (isAngular) {
                        angular.element(document).injector().invoke(function($compile) {
                            var scope = angular.element(body).scope();
                            $compile(body)(scope);
                        })
                    }

                    fn.initEvents(content);
                    body.html(content);
                }
            })
        }

        e.preventDefault();
    });

    // Window Confirm
    $$("[confirm]").click(function(e) {
        if (e.which!=1)
            return true;

        var $this = $(this);
        var modal = fn.confirm({
            title: $this.attr("confirm-title"),
            body: $this.attr("confirm"),
            yes: function() {
                $this[0].click();
            }
        });

        if (!modal.hasClass("in")) {
            e.stopImmediatePropagation();
            return false;
        }
    })

    $$("a[method]").click(function(e) {
        e.preventDefault();
        
        var $this = $(this);
        var form = $("<form method='POST' action='"+ $this.attr("href") +"' class='hide'>"+
                        +"<input name='_method' type='hidden' value='"+ $this.attr("method") +"'>"
                        +"<input name='_token' type='hidden' value='"+ fn.csrf +"'>"
                    +"</form>");
        
        form.submit();
    });

    // tooltip
    $$('[tooltip]').each(function() {
        var $this = $(this);
        var title = $this.attr("tooltip");

        if (!fn.empty(title))
            $this.attr("title", title);

        $this.tooltip();
    })
};