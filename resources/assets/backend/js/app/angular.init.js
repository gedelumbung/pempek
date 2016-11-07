/** Angular */
var isAngular = typeof angular !== 'undefined';

if (isAngular) {
    // angular modules
    var module = [];

    var moduleExists = function(name) {
       try {
          angular.module(name);
          return true;
       }
       catch (err) {
          return false;
       }
    }

    for (var i in module) {
        if (!moduleExists(module[i]))
            module.splice(i, 1);
    }

    var app = angular.module("main-app", module);

    // Factories
    app.factory("$func", function($http) {
        return {
            post: function(url, data) {
                var data = data || {};
                data._csrf = csrfToken;

                return $http({
                    method: "POST",
                    url : url,
                    data : $.param(data),
                    headers : {'Content-Type': 'application/x-www-form-urlencoded'}
                })
            },
            init: function(data) {
                if (window.hasOwnProperty("data") && window.data.hasOwnProperty(data))
                    return window.data[data];
            }
        }
    });

    // Filters
    app.filter("isEmpty", function() {
        return fn.empty;
    })

    // Directives
    app.directive("ngRepeat", function () {
        return function (scope, element, attrs) {
            scope.$watch(function () {
                fn.initEvents(element);
            });
        };
    })
}