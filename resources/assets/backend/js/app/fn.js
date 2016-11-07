var fn = {
    csrf: $('meta[name="csrf-token"]').attr("content"),

    /**
     * Generate url with http query
     * 
     * @param  string   url    
     * @param  object   params 
     * @return string
     */
    url: function(url, params) {
        if (fn.empty(params))
            return url;

        var query = [];

        for (var key in params)
            query.push(key + '=' + encodeURIComponent(params[key]));

        return url + '?' + query.join("&");
    },

    format: {
        /**
         * Convert value into number format
         * 
         * @param  String|int  value
         * @return String
         */
        num: function(value) {
            // remove unwanted characters
            var value = String(value).replace(/[^\d\-]/gi, '');

            var comma = 0, // jumlah angka dibelakang comma
                strval = String(value<0 ? value*-1 : value).replace(/[\s\,\.\-]/g, ''),
                len = strval.length-comma;

            var str = "";
            var start = 0;
            var c = Math.ceil(len/3);

            var mod = len%3;
            mod = mod==0 ? 3 : mod;

            // reformat value
            for (var i = 0; i < c; i++) {
                str += strval.substr(start,i==0 ? mod : 3);
                str += i+1==c ? comma!=0 ? '.' : '' : ',';
                start += i==0 ? mod : 3;
            }

            str += strval.substr(len, comma);

            // negative value
            if (value<0) 
                str = '-'+str;

            return str;
        }
    },

    /**
     * Filter data object
     * 
     * @param  object|array  obj      
     * @param  Function      callback
     * @return array
     */
    grep: function(obj, callback) {
        var data = [];

        for (var i in obj) {
            if (callback(obj[i], i))
                data.push(obj[i]);
        }

        return data;
    },

    /**
     * Check value existence
     * 
     * @param  object|array  obj      
     * @param  Function      callback
     * @return boolean
     */
    exist: function(obj, callback) {
        for (var i in obj) {
            if (callback(obj[i], i) === true)
                return true;
        }

        return false;
    },

    /**
     * Check is numeric value
     * 
     * @param  mixed   value
     * @return boolean
     */
    isNumeric: function(value) {
        return !((typeof value=="string" && value.trim()=="") || isNaN(value) || !isFinite(value) || value===undefined || value===null)
    },

    /**
     * Convert value into Integer
     * 
     * @param  mixed   value
     * @return integer
     */
    int: function(value) {
        return fn.isNumeric(value) ? parseInt(value) : 0;
    },

    /**
     * Show error modal
     * 
     * @param  String  message
     * @param  String  title  
     */
    alertError: function(message, title) {
        var modal = $("#error-alert");

        modal.modal("show");

        if (title !== undefined)
            $(".modal-title", modal).html(title);

        if (message !== undefined)
            $(".modal-body", modal).html(message);
    },

    /**
     * Show alert Modal
     * 
     * @param  String  message
     * @param  String  title  
     */
    alert: function(message, title) {
        var modal = $("#modal-basic");

        modal.modal("show");

        $(".modal-title", modal).html(title || "Info");
        $(".modal-body", modal).html(message);
    },

    /**
     * Show Confirmation Modal
     * 
     * @param  object  opt
     */
    confirm: function(opt) {
        var modal = $(opt.selector || "#modal-confirm");

        // show modal event
        if (!modal.hasClass("in")) {
            modal.find(".modal-title").html(opt.title || "Warning!");
            modal.find(".modal-body").html(opt.body || "Are you Sure ?");
            modal.modal("show");

            var accept = false;

            // yes
            modal.find('.modal-accept').unbind("click").bind("click", function(e) {
                accept = true;

                if (opt.hasOwnProperty("yes"))
                    opt.yes(e);
            });

            // no
            modal.off("hidden.bs.modal").on("hidden.bs.modal", function(e) {
                if (accept===false && opt.hasOwnProperty("no"))
                    opt.no(e)
            })
        }

        return modal;
    },

    /**
     * Check if variable is empty
     * 
     * @param  mixed  object
     * @return boolean
     */
    empty: function(object) {
        var type = typeof object;

        switch (type) {
            case "undefined":
                return true;

            case "object":
                if (object === null)
                    return true;

                return object.hasOwnProperty('length') ? object.length==0 : Object.keys(object).length==0;

            case "string":
                return object.trim()==="";

            default: return false;
        }
    },

    /**
     * Check variable existence
     * 
     * @param  mixed  value
     * @return boolean
     */
    isset: function(value) {
        if (value === undefined || value === null)
            return false;

        for (var i in arguments) {
            if (i == 0)
                continue;

            if (typeof value[arguments[i]] === "undefined")
                return false;

            value = value[arguments[i]];
        }

        return true;
    },

    /**
     * Show messages notification
     * @param  String|Array messages
     * @param  String type
     */
    notif: (function() {
        var notif = function(messages, type) {
            if (!(messages instanceof Array))
                messages = [messages];

            for (var i in messages)
                notif.add(messages[i], type);
        };

        notif.add = function(message, type) {
            var param = typeof message!=="object" ? {msg: message} : message;

            if (!fn.isset(window.stack_bottomright))
                window.stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 15, "firstpos2": 15};

            // set class name
            param.type = type || param.type || "notice";
            param.class = param.class || "";

            switch (param.type) {
                case "info": 
                    param.title = param.title || "Information";
                    param.icon = param.icon || "fa fa-info";
                    break;

                case "error": 
                    param.title = param.title || "Ooopss..!";
                    param.icon = param.icon || "fa fa-times";
                    break;

                case "success": 
                    param.title = param.title || "Successful";
                    param.icon = param.icon || "fa fa-check";
                    break;

                case "warning": 
                    param.type = "notice";
                case "notice": 
                default: 
                    param.title = param.title || "Warning";
                    param.icon = param.icon || "fa fa-exclamation-triangle";
                    break;
            };

            var notice = new PNotify({
                title: param.title,
                text: param.msg,
                type: param.type,
                addclass:  param.class +' stack-bottomright',
                icon: param.icon,
                shadow: true,
                buttons: {closer: false, sticker: false},
                stack: stack_bottomright,
            });

            // remove notification on click
            notice.get().click(function() {
                notice.remove();
            });
        };

        return notif;
    }) (),

    /**
     * show flash messages alert
     * @param  String|Array messages
     * @param  String type
     */
    flash: function(messages, type) {
        if (!(messages instanceof Array))
            messages = [messages];

        $("<div class='alert alert-"+ (type || "warning") +"' role='alert'>"
                +"<button type='button' class='close' data-dismiss='alert'> <span>&times;</span> </button>"
                +"<li>"+ messages.join("</li><li>") +"</li>"
            +"</div>"
        ).hide().insertAfter(".page-header").fadeIn();
    },

    /**
     * handle service response
     * 
     * @param  Object   data    response object
     */
    handleResponse: function(data) {
        // invalid data format
        var valid = fn.isset(data, "status") && fn.isset(data, "statusCode");

        return {
            data: data,

            isValidResponse: function() {
                return valid;
            },
            isSuccess: function() {
                return valid && data.status=="success";
            },

            showNotif: function() {
                if (valid)
                    fn.notif(data.message, data.status);
                
                return this;
            },
            showFlash: function() {
                if (valid)
                    fn.flash(data.message, data.status);

                return this;
            },

            handle: function(status, callback) {
                if (valid && data.status == status)
                    callback(data);
                
                return this;
            },
            success: function(callback) {
                return this.handle("success", callback);
            },
            error: function(callback) {
                return this.handle("error", callback);
            },
            warning: function(callback) {
                return this.handle("warning", callback);
            },
        };
    },
};