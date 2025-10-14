(function($){
  function initTable($table){
    const fileId     = $table.data('file-id');
    const sheet      = $table.data('sheet') || '';
    const ttl        = parseInt($table.data('ttl'), 10) || 3600;
    const pageLength = parseInt($table.data('page-length'), 10) || 25;
    const orderCol   = parseInt($table.data('order-col'), 10) || 0;
    const orderDir   = ($table.data('order-dir') === 'desc') ? 'desc' : 'asc';

    if(!fileId){ console.error('Brak fileId (data-file-id).'); return; }

    const params = {
      action: 'table_xls_data',
      nonce: TABLEXLS.nonce,
      file_id: fileId,
      sheet: sheet,
      ttl: ttl,
      draw: 1,
      start: 0,
      length: 1,
      columns_only: 1 // <-- NOWOŚĆ: poproś też o listę kolumn
    };

    $.getJSON(TABLEXLS.ajax_url, params)
      .done(function(resp){
        if(resp?.success === false){
          console.error('AJAX error:', resp?.data?.message || resp);
          return;
        }

        // 1) Spróbuj z columns (z backendu)
        let keys = resp?.columns || [];
        // 2) Fallback: wyciągnij z pierwszego rekordu jeśli jest
        if((!keys || !keys.length) && resp?.data && resp.data[0]){
          keys = Object.keys(resp.data[0]);
        }

        if(!keys || !keys.length){
          console.error('Brak kolumn. Użyj ?debug=1 aby sprawdzić parser.');
          return;
        }

        const cols = keys.map(k => ({ data: k, title: k.replace(/_/g,' ').toUpperCase() }));
        const thead = $('<tr/>');
        cols.forEach(c => thead.append($('<th/>').text(c.title)));
        $table.find('thead').html(thead);

        $table.DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: TABLEXLS.ajax_url,
            type: 'GET',
            data: function(d){
              d.action = 'table_xls_data';
              d.nonce  = TABLEXLS.nonce;
              d.file_id= fileId;
              d.sheet  = sheet;
              d.ttl    = ttl;
            }
          },
          columns: cols,
          pageLength: pageLength,
          deferRender: true,
          stateSave: true,
          searchDelay: 250,
          order: [[orderCol, orderDir]]
        });
      })
      .fail(function(xhr){
        let msg = 'AJAX błąd';
        try { msg = xhr.responseJSON?.data?.message || xhr.responseText || msg; } catch(e){}
        console.error(msg, xhr);
      });
  }

  $(function(){
    $('table.display[data-file-id]').each(function(){ initTable($(this)); });
  });
})(jQuery);
