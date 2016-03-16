function GridTable() {
    this.url = "";
    this.KeyColumnName = "";
    this.CaptionColumnString = "";
    this.ColumnString = "";
    this.IsShowPager = false;
    this.TableId = "";
    this.PagerId = "";
    this.PageSize = 20;
    this.PageIndex = 1;
    this.PagerSize = 5;
    this.ObjectName = "";
    this.SelectID = "";
    this.IsShowCheckBox = true;    
    this.Pager = function (PageIndex) {
        this.PageIndex = PageIndex;
        this.Show();
    };
    this.GridRowClick = function (obj,ID) {
        $("#"+obj.id+"").addClass('GridTableRowOver');
        $("#" + this.SelectID ).attr("value", ID);
        if (this.IsShowCheckBox) {
            var checks = $("#" + this.TableId + " input[type = 'checkbox']");
            for (var i = 0; i < checks.length; i++) {
                if (checks[i].id == ID) {
                    checks[i].checked = true;
                }
                else {
                    checks[i].checked = false;
                }
            }
        }        
    };
    this.Show = function () {
        var CaptionColumns = new Array();
        CaptionColumns = this.CaptionColumnString.split(',');
        var Columns = new Array();
        Columns = this.ColumnString.split(',');
        //读取值
        var pageIndex = this.PageIndex;
        var keyColumnName = this.KeyColumnName;
        var tableId = this.TableId;
        var pagerId = this.PagerId;
        var isShowPager = this.IsShowPager;
        var pageSize = this.PageSize;
        var objectName = this.ObjectName;
        var pagerSize = this.PagerSize;
        var Url = this.url;
        var isShowCheckBox = this.IsShowCheckBox;
        //清除table内容并显示标题头
        $("#" + tableId ).html('');
        $("#" + pagerId ).html('');
        var title = '<tr>';

        if (isShowCheckBox) {
            title += '<th></th>';
        }
        for (var i = 0; i < CaptionColumns.length; i++) {
            title += '<th>' + CaptionColumns[i] + '</th>';
        }
        title += '</tr>';
        $("#" + tableId ).append(title);
        Url=Url + "&pagesize=" + pageSize + "&pageindex=" + pageIndex + "&time=" + new Date().getTime();
        //显示数据
        $.ajax({
            url: Url,
            dataType: "text",
            async: false,
            error: function (text) {
                alert("error");
            },
            success: function (text) {
                if (text.length == 0) {
                    alert('error');
                }
                var dataObj = eval("(" + text + ")");                
                var row = "";
                $.each(dataObj.items, function (idx, item) {
                    var bgcolor = '';
                    if (idx % 2 == 1) bgcolor = " style=\"background-color:#E8EDF3;\" ";
                    if (item[keyColumnName] != undefined) {
                        var row = '';
                        if (isShowCheckBox) {
                            row += "<tr id='t" + item[keyColumnName] + "' " + bgcolor + " onclick=\"javascript:" + objectName + ".GridRowClick(this,'" + item[keyColumnName] + "');\"><td width=\"20px\"><input id=\"" + item[keyColumnName] + "\" type=\"checkbox\"/></td>";
                        }
                        else {
                            row += "<tr id='t" + item[keyColumnName] + "' " + bgcolor + "   onclick=\"javascript:" + objectName + ".GridRowClick(this,'" + item[keyColumnName] + "');\">";
                        }
                        for (var j = 0; j < Columns.length; j++) {
                            row += '<td>' + item[Columns[j]] + '</td>';
                        }
                        row += '</tr>';
                        $("#" + tableId ).append(row);                       
                    }
                });
                //分页
                if (isShowPager) {
                    var RowCount = dataObj.rowcount;
                    var SizeCount = 0;
                    if (RowCount != 0) {
                        SizeCount = Math.ceil(RowCount / pageSize);
                    }
                    pagestr = "<tr><td  valign=\"bottom\" align=\"left\" nowrap=\"true\" style=\"width:40%;\">记录数：" + RowCount + "条<span style=\"margin-left:5px;\"></span>每页显示：" + pageSize + "条 ";
                    pagestr += "当前页：第" + pageIndex + "页<span style=\"margin-left:5px;\"></span>总页数：" + SizeCount + "页<span style=\"margin-left:60px;\"></span>";
                    pagestr += "<a href=\"javascript:" + objectName + ".Pager(" + pageIndex + ");\" style=\"margin-right:5px;\">&lt;&lt;</a>";

                    if (pageIndex <= pagerSize) {
                        if (pageIndex + pagerSize > SizeCount) {
                            for (var i = 1; i <= SizeCount; i++) {
                                if (pageIndex == i) {
                                    pagestr += "<span style=\"margin-right:5px;font-weight:Bold;color:red;\">" + i + "</span>";
                                }
                                else {
                                    pagestr += "<a href=\"javascript:" + objectName + ".Pager(" + i + ");\" style=\"margin-right:5px;\">" + i + "</a>";
                                }
                            }
                        }
                        else {
                            for (var i = 1; i <= pageIndex + pagerSize; i++) {
                                if (pageIndex == i) {
                                    pagestr += "<span style=\"margin-right:5px;font-weight:Bold;color:red;\">" + i + "</span>";
                                }
                                else {
                                    pagestr += "<a href=\"javascript:" + objectName + ".Pager(" + i + ");\" style=\"margin-right:5px;\">" + i + "</a>";
                                }
                            }
                        }
                    }
                    else {
                        if (pageIndex + pagerSize > SizeCount) {
                            for (var i = pageIndex - pagerSize; i <= SizeCount; i++) {
                                if (pageIndex == i) {
                                    pagestr += "<span style=\"margin-right:5px;font-weight:Bold;color:red;\">" + i + "</span>";
                                }
                                else {
                                    pagestr += "<a href=\"javascript:" + objectName + ".Pager(" + i + ");\" style=\"margin-right:5px;\">" + i + "</a>";
                                }
                            }
                        }
                        else {
                            for (var i = pageIndex - pagerSize; i <= pageIndex + pagerSize; i++) {
                                if (pageIndex == i) {
                                    pagestr += "<span style=\"margin-right:5px;font-weight:Bold;color:red;\">" + i + "</span>";
                                }
                                else {
                                    pagestr += "<a href=\"javascript:" + objectName + ".Pager(" + i + ");\" style=\"margin-right:5px;\">" + i + "</a>";
                                }
                            }
                        }
                    }
                    pagestr += "<a href=\"javascript:" + objectName + ".Pager(" + SizeCount + ");\" style=\"margin-right:5px;\">&gt;&gt;</a>";
                    pagestr += "</td></tr>";
                    $("#" + pagerId ).append(pagestr);
                }
            }
        });
    };
}