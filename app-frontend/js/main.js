$(document).ready(function() {
    var domainList = [];

    function CheckIsValidDomain(domain) {
        if (/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+$/.test(domain)) {
            return true;
        }
        return false;
    }

    $("#add-url").click(function() {
        let domainUrl = $('#domainUrl').val();

        if (CheckIsValidDomain(domainUrl)) {
            $(".alert").hide();
            $("#domains-list").append('<li class="list-group-item">' + domainUrl + '</li>');
            $.each($('ul').children(), function(key, value) {
                domainList.push(($(value).text()));
            });
        } else {
            $(".alert-warning").show();
        }
        return false;
    });


    $("#lookup").click(function() {
        $(".results").html('');

        if (domainList && domainList.length) {
            $.ajax({
                type: "POST",
                url: "http://localhost/api/domains?domains",
                data: { 'domains': domainList },
                success: function(datos) {
                    $.each(datos, function(key, nslookups) {

                        $.each(nslookups, function(key, nslookup) {
                            $(".results").append(
                                '<tr>' +
                                '<th scope="row">' + nslookup.id + '</th>' +
                                '<th scope="row">' + nslookup.class + '</th>' +
                                '<th scope="row">' + nslookup.created_at + '</th>' +
                                '<th scope="row">' + nslookup.host + '</th>' +
                                '<th scope="row">' + nslookup.type + '</th>' +
                                '<th scope="row">' + nslookup.ttl + '</th>' +
                                '<th scope="row">' + nslookup.type + '</th>' +
                                '</tr>'
                            );
                        });
                    });
                }
            });

        } else {
            $(".alert-danger").show();
        }
    });

});