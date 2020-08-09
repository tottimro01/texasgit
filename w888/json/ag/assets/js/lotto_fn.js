function checknRob(zone='',_rob = '' , aryParam)
{
    var lang = [];
        lang['lang_all'] = aryParam['lang_all'];
    var rob = aryParam['rob'];
    var nrob = aryParam['nrob']; 

    if(nrob[zone] == 1 || zone == '')
    {
        $('#rob').hide();
        $('#rob').children('select').text('');
        var html =   "<option value=''>ทั้งหมด</option>";
        $('#rob').children('select').append(html)
    }else if(nrob[zone] == 2)
    {
        var html ='';

        $('#rob').children('select').text('');
           var html =   "<option value=''>"+lang['lang_all']+"</option>";
                     
           for(var i = 1; i<= nrob[zone]; i++)
           {
             var cellSLTD = ''
             if(_rob == i){ cellSLTD = 'selected'; }
             html += "<option value='"+i+"' "+cellSLTD+">"+rob[i]+"</option>";
           }
    
           $('#rob').children('select').append(html)
           $('#rob').show();

    }else if(nrob[zone] == 4)
    {

          $('#rob').children('select').text('');
           var html =   "<option value=''>"+lang['lang_all']+"</option>";
                     
           for(var i = 1; i<= nrob[zone]; i++)
           {
             var cellSLTD = ''
             if(_rob == i){ cellSLTD = 'selected'; }  
             html += "<option value='"+i+"' "+cellSLTD+">"+rob[i]+"</option>";
           }

           $('#rob').children('select').append(html)
           $('#rob').show();

    }else if(nrob[zone] == 96)
    {
            $('#rob').children('select').text('');
            var html =   "<option value=''>"+lang['lang_all']+"</option>";
                      
            for(var i = 1; i<= nrob[zone]; i++)
            {
              var cellSLTD = ''
             if(_rob == i){ cellSLTD = 'selected'; }  
              html += "<option value='"+i+"' "+cellSLTD+">"+i+"</option>";
            }

            $('#rob').children('select').append(html)
            $('#rob').show();

    }else if(nrob[zone] == 11)
    {
           var rob = aryParam['robmun']; 
            $('#rob').children('select').text('');
            var html =   "<option value=''>"+lang['lang_all']+"</option>";
                      
            for(var i = 1; i<= nrob[zone]; i++)
            {
              var cellSLTD = ''
             if(_rob == i){ cellSLTD = 'selected'; } 
              html += "<option value='"+i+"' "+cellSLTD+">"+rob[i]+"</option>";
            }

            $('#rob').children('select').append(html)
            $('#rob').show();
    } 

}
