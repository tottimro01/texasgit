{"title":"\u0e25\u0e47\u0e2d\u0e15\u0e40\u0e15\u0e2d\u0e23\u0e4c\u0e23\u0e35\u0e48","sub_title":"\u0e22\u0e2d\u0e14\u0e0b\u0e37\u0e49\u0e2d\u0e15\u0e32\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e20\u0e17","date":[{"pdate":"2019-04-01"},{"pdate":"2019-03-16"},{"pdate":"2019-03-01"},{"pdate":"2019-02-16"},{"pdate":"2019-02-01"},{"pdate":"2019-01-17"},{"pdate":"2018-12-30"},{"pdate":"2018-12-16"},{"pdate":"2018-12-01"},{"pdate":"2018-11-16"}],"temp":"<div class=\"row \">\n    <div>\n        <div class=\"widget-box no-border\"  id=\"reloatLotterySBT\">\n            <div class=\"widget-header hidden \">\n                <h4 class=\"widget-title bigger lighter\">\n                   \u0e22\u0e2d\u0e14\u0e0b\u0e37\u0e49\u0e2d\u0e15\u0e32\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e20\u0e17 \n                <\/h4>\n                <div class=\"widget-toolbar\">\n                    <a href=\"#\" data-action=\"collapse\">\n                        <i class=\"1 ace-icon fa bigger-125 fa-chevron-up\"><\/i>\n                    <\/a>\n                <\/div>\n                <div class=\"widget-toolbar hidden\">\n                    <a href=\"#\" >\n                        <i class=\"ace-icon fa fa-refresh\"><\/i>\n                    <\/a>\n                <\/div>\n            <\/div>\n            <div class=\"widget-body\">\n                <div class=\"widget-main\">\n                    <form class=\"form-horizontal\" method=\"get\">\n                        <div class=\"form-group\">\n                            <div class=\"col-xm-12 col-md-4\">\n                                <div class=\"table-responsive\">\n                                    <table  class=\"table table-striped table-bordered table-hover\">\n                                        <thead>\n                                            <tr>\n                                                <td colspan=\"2\" class=\"text-center\">\n                                                    <select  class=\"col-sm-12 input-sm\" id=\"opPdate\">\n                                                        <option value=\"\" >\u0e01\u0e23\u0e38\u0e13\u0e32\u0e40\u0e25\u0e37\u0e2d\u0e01<\/option> \n                                                                                                                                                                                    <option value=\"2019-04-01\" >2019-04-01<\/option> \n                                                                                                                            <option value=\"2019-03-16\" >2019-03-16<\/option> \n                                                                                                                            <option value=\"2019-03-01\" >2019-03-01<\/option> \n                                                                                                                            <option value=\"2019-02-16\" >2019-02-16<\/option> \n                                                                                                                            <option value=\"2019-02-01\" >2019-02-01<\/option> \n                                                                                                                            <option value=\"2019-01-17\" >2019-01-17<\/option> \n                                                                                                                            <option value=\"2018-12-30\" >2018-12-30<\/option> \n                                                                                                                            <option value=\"2018-12-16\" >2018-12-16<\/option> \n                                                                                                                            <option value=\"2018-12-01\" >2018-12-01<\/option> \n                                                                                                                            <option value=\"2018-11-16\" >2018-11-16<\/option> \n                                                                                                                                                                        <\/select>\n                                                <\/td>\n                                            <\/tr>\n                                        <\/thead>\n                                        <tbody>\n                                            <tr>\n                                                <td>\u0e22\u0e2d\u0e14\u0e0b\u0e37\u0e49\u0e2d<\/td> \n                                                <td class=\"text-right num\" id=\"sumBuy_sbt\">0.00<\/td>\n                                            <\/tr>\n                                            <tr>\n                                                <td>\u0e04\u0e48\u0e32\u0e04\u0e2d\u0e21<\/td> \n                                                <td class=\"text-right num\" id=\"sumCom_sbt\">0.00<\/td>\n                                            <\/tr>\n                                            <tr>\n                                                <td>\u0e22\u0e2d\u0e14\u0e2a\u0e38\u0e17\u0e18\u0e34<\/td> \n                                                <td class=\"text-right num\" id=\"total_sbt\">0.00<\/td>\n                                            <\/tr>\n                                        <\/tbody>\n                                    <\/table>\n                                <\/div>\n                            <\/div>\n                            <div class=\"col-xm-12\">\n                                <div class=\"col-sm-12\">\n                                    <div class=\"table-responsive\">\n                                        <table id=\"tb_lotterySBT\" class=\"table table-striped table-bordered table-hover text-center\">\n                                            <thead>\n                                                <tr>\n\n                                                <\/tr>\n                                            <\/thead>\n                                            <tbody><\/tbody>\n                                        <\/table>\n                                    <\/div>\n                                <\/div>\n                            <\/div>\n                        <\/div>\n                    <\/form>\n                <\/div>\n            <\/div>\n        <\/div>\n    <\/div>\n<\/div>\n<script type=\"text\/javascript\">\n\n    $('#opPdate').on('change',function(e) {\n        getLotterySBU($('#opPdate').val());\n    });\n    function getLotterySBU(pdate){\n        $('#reloatLotterySBT').load('show');\n        $.ajax({\n            url: 'lotterySummaryByTypeGet',\n            type: 'POST',\n            dataType: 'json',\n            data: { \n                _token: $('input[name=_token]').val(),\n                pdate : pdate\n            },\n        })\n        .done(function(response) {\n            var thead = \"\";\n            var table = \"\";\n            var sumBuy = 0;\n            var sumCom = 0;\n            var total  = 0;\n            if(response.status){\n\n                for (var i = 0; i < 10; i++){\n                    thead += '<th>\u0e15\u0e31\u0e27\u0e40\u0e25\u0e02<\/th>'; \n                }\n    \n                $('#tb_lotterySBT thead > tr').html(thead);\n\n                if(response.result){\n                    var tr = \"<tr>\";\n                    var i  = 0;\n                    var totalData = response.result.length;\n                    $.each(response.result,function(k,v){\n                        sumBuy += Number(v.lottery_buy);\n                        sumCom += Number(v.pay_com);\n\n                        tr += '<td>'+ v.lottery_number +'<\/td>';\n                        if(i == 9 || k == (totalData -1)){\n                            tr += '<\/tr>';\n                            table += tr;\n                            tr = '<tr>';\n                            i = -1;\n                        }\n                        i++;\n                    });\n                }\n                total = sumBuy - sumCom;\n            }else{\n                table = '<tr><td colspan=\"10\" class=\"text-center text-danger\"> \u0e44\u0e21\u0e48\u0e1e\u0e1a\u0e02\u0e49\u0e2d\u0e21\u0e39\u0e25 <\/td><\/tr>'; \n            }\n\n            $('#sumBuy_sbt').text(sumBuy.toFixed(2));\n            $('#sumCom_sbt').text(sumCom.toFixed(2));\n            $('#total_sbt').text(total.toFixed(2));\n\n            $('#tb_lotterySBT tbody').html(table);\n        }).always(function(){\n            $('td.num').digits();\n            $('#reloatLotterySBT').load('hide');\n        });\n    }\n<\/script>\n"}