$('.button').on('click', {
    'name': function(element) {
      return $(element).data('name');
    },
    'desc': function(element) {
      return $(element).data('desc');      
    },
    'sd': function(element) {
      return $(element).data('sd');      
    },
    'ed': function(element) {
      return $(element).data('ed');      
    },
    'loc': function(element) {
      return $(element).data('loc');      
    },
    'bud': function(element) {
      return $(element).data('bud');      
    },
    'cli': function(element) {
      return $(element).data('cli');      
    },

  },

  function(e) {
    $('#pname').html(e.data.name(this));
    $('#pdata').html(e.data.desc(this));
    $('#psd').html(e.data.sd(this));
    $('#ped').html(e.data.ed(this));
    $('#ploc').html(e.data.loc(this));
    $('#pbud').html(e.data.bud(this));
    $('#pcli').html(e.data.cli(this));
  });
