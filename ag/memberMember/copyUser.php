{"result":"<br>\n<div class=\"widget-box\">\n    <div class=\"widget-header widget-header-blue widget-header-flat\">\n        <h4 class=\"widget-title lighter\"><strong> \u0e04\u0e31\u0e14\u0e25\u0e2d\u0e01\u0e1c\u0e39\u0e49\u0e43\u0e0a\u0e49 <font style=\"color:#c90000\"><\/font> <\/strong><\/h4>\n    <\/div>\n    <div class=\"widget-body\">\n        <form class=\"form-horizontal\" id=\"\" action=\"\" method=\"post\">\n            <div class=\"widget-main\">\n                <div class=\"row\">\n                    <div class=\"col-xs-12\">\n                        <div class=\"form-group\">\n                            <label class=\"col-xs-12 col-sm-4 control-label no-padding-right\">\n                                <strong>\u0e08\u0e32\u0e01\u0e0a\u0e37\u0e48\u0e2d\u0e1a\u0e31\u0e0d\u0e0a\u0e35 : <\/strong>\n                            <\/label>\n                            <select id=\"select-user\" class=\"col-xs-12 col-sm-5 repositories\"><\/select>\n                        <\/div>\n                        <div class=\"form-group\">\n                            <label class=\"col-xs-12 col-sm-4 control-label no-padding-right\">\n                                <strong>\u0e0a\u0e37\u0e48\u0e2d\u0e1c\u0e39\u0e49\u0e43\u0e0a\u0e49 : <\/strong>\n                            <\/label>\n                            <div class=\"col-xs-12 col-sm-6\">\n                                <div class=\"input-group\" style=\"width:180px;\">\n                                    <span class=\"input-group-addon\">\n                                        <strong> OHO<\/strong>\n                                        <input type=\"hidden\" name=\"usermain\" value=\"OHO\">\n                                    <\/span>\n                                    <input type=\"text\" maxlength=\"5\" id=\"regis_usernameCopy\" name=\"regis_usernameCopy\" class=\"col-xs-12 col-sm-12 inputEngNum\" \/>\n                                <\/div>\n                            <\/div>\n                        <\/div>\n                        <div class=\"form-group\">\n                            <label class=\"col-xs-12 col-sm-4 control-label no-padding-right\"><strong>\u0e23\u0e2b\u0e31\u0e2a\u0e1c\u0e48\u0e32\u0e19 : <\/strong><\/label>\n                            <div class=\"col-xs-12 col-sm-5\">\n                                <input type=\"password\" id=\"regis_password\" name=\"regis_password\" class=\"col-xs-12 col-sm-12\" \/>\n                            <\/div>\n                        <\/div>\n                        <div class=\"form-group\">\n                            <label class=\"col-xs-12 col-sm-4 control-label no-padding-right\" ><strong>\u0e40\u0e04\u0e23\u0e14\u0e34\u0e15 : <\/strong><\/label>\n                            <div class=\"col-xs-12 col-sm-5\">\n                                <input type=\"text\" id=\"regis_credit\" name=\"regis_credit\" class=\"col-xs-12 col-sm-12 numeric\" \/>\n                            <\/div>\n                        <\/div>\n                        <div class=\"form-group\">\n                            <label class=\"col-xs-12 col-sm-4 control-label no-padding-right\" ><strong>\u0e0a\u0e37\u0e48\u0e2d : <\/strong><\/label>\n                            <div class=\"col-xs-12 col-sm-5\">\n                                <input type=\"text\" id=\"regis_name\" name=\"regis_name\" class=\"col-xs-12 col-sm-12\" \/>\n                            <\/div>\n                        <\/div>\n                        <div class=\"form-group\">\n                            <label class=\"col-xs-12 col-sm-4 control-label no-padding-right\" ><strong>\u0e40\u0e1a\u0e2d\u0e23\u0e4c\u0e42\u0e17\u0e23\u0e28\u0e31\u0e1e\u0e17\u0e4c : <\/strong><\/label>\n                            <div class=\"col-xs-12 col-sm-5\">\n                                <input type=\"text\" id=\"regis_tel\" name=\"regis_tel\" class=\"col-xs-12 col-sm-12\" \/>\n                            <\/div>\n                        <\/div>\n                    <\/div>\n                <\/div>\n            <\/div>\n        <\/form>\n    <\/div>\n<\/div>\n<script src=\"assets\/js\/selectize.js\"><\/script>\n<script type=\"text\/javascript\">\n    $('.numeric').autoNumeric();\n    $('#select-user').selectize({\n        valueField: 'u_username',\n        labelField: 'u_username',\n        searchField:'u_username',\n        options: [],\n        create: false,\n        render: {\n            option: function(item, escape) {\n                return '<div>' +\n                    '<span class=\"title\">' +\n                        '<span class=\"name\">' + escape(item.u_username) + '<\/span>' +\n                    '<\/span>'+\n                '<\/div>';\n            }\n        },\n        load: function(query, callback) {\n            if (!query.length) return callback();\n            $.ajax({\n                url: 'memberMember\/getUser.php',\n                type: 'GET',\ndata: {user: encodeURIComponent(query)},\n                error: function() {\n                    callback();\n                },\n                success: function(res) {\n                    callback(res.slice(0, 10));\n                }\n            });\n        }\n    });\n<\/script>"}


