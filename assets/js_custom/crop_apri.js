$(function(){
        var jcrop_api;

        $('#cropbox').Jcrop({
            aspectRatio: 2,
            onSelect: updateCoords
        },function(){
            jcrop_api = this;
        });

        jcrop_api.setOptions({
            bgFade: true,
            bgOpacity: 0.4
        });
    });

    function updateCoords(c)
    {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    };

    function checkCoords()
    {
        if (parseInt($('#w').val())) return true;
        alert('Please select a crop region then press submit.');
        return false;
    };