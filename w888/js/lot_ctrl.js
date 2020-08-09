function addNumberComma(val){
  while (/(\d+)(\d{3})/.test(val.toString())){
    val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
  }
  return val;
}

// detect input value change by js
var valueDescriptor = Object.getOwnPropertyDescriptor(HTMLInputElement.prototype, "value");
HTMLInputElement.prototype.addInputChangedByJsListener = function(cb){
  if(!this.hasOwnProperty("_inputChangedByJSListeners")){
    this._inputChangedByJSListeners = [];
  }
  this._inputChangedByJSListeners.push(cb);
}

Object.defineProperty(HTMLInputElement.prototype, "value", {
  get: function(){
    return valueDescriptor.get.apply(this, arguments);
  },
  set: function(){
    var self = this;
    valueDescriptor.set.apply(self, arguments);
    if(this.hasOwnProperty("_inputChangedByJSListeners")){
      this._inputChangedByJSListeners.forEach(function(cb){
        cb.apply(self);
      })
    }
  }
});

$(document).ready(function(){
  var crsBet = document.querySelectorAll('input[type="checkbox"].lotbet_cross');
  watch(crsBet, 'disabled', function(){
    lotbetCrossCheckCallback(this);
  });

  var inpBet = document.querySelectorAll('input.input.lotbet');
  watch(inpBet, 'disabled', function(){
    lotbetInputCallback(this);
  });
  for(var i = 0; i < inpBet.length; i++){
    inpBet[i].addInputChangedByJsListener(function(){
      lotbetInputCallback(this);
    });
  }

  var inpNum = document.querySelectorAll('input.input.lotnum');
  for(var i = 0; i < inpNum.length; i++){
    inpNum[i].addInputChangedByJsListener(function(){
      lotnumInputCallback(this);
    });
  }

  $(document).on('input', 'input.input.lotnum', function(event){
    event.preventDefault();
    var $self = this;
    lotnumInputCallback(this);
  });

  $(document).on('input', 'input.input.lotnum_laoset', function(event){
    event.preventDefault();
    var $self = this;
    var relateInput = $('input.input.lotnum_laoset');
    var sumValue = 0;
    var laosetPrice = parseInt($('.lotbet-col-sum.total').data('laoset-price'), 10);
    $.each(relateInput, function(index, val){
      var v = $.trim($(val).val());
      if(v.length == 0)
        return true;
      sumValue += laosetPrice;
    });
    $('.lotbet-col-sum.total .tt').text(sumValue);
  });

  $(document).on('input', 'input.input.lotbet', function(event){
    event.preventDefault();
    var $self = this;
    lotbetInputCallback(this);
  });

  $(document).on('change', 'input[type="checkbox"].lotbet_cross', function(event){
    event.preventDefault();
    var $self = this;
    lotbetCrossCheckCallback($self);
  });

  function lotbetCrossCheckCallback($el){
    var refRow = $($el).data('lotbet-row');
    var relateInput = $('input.input.lotbet._' + refRow);
    $.each(relateInput, function(index, val){
      lotbetInputCallback(val);
    });
  }

  function lotnumInputCallback($el){
    var refRow = $($el).data('lotbet-row');
    var relateInput = $('input.input.lotbet._' + refRow);
    $.each(relateInput, function(index, val){
      lotbetInputCallback(val);
    });
  }

  function lotbetInputCallback($el){
    var refCol = $($el).data('lotbet-col');
    var relateInput = $('input.input.lotbet.' + refCol);
    var sumValue = 0;
    $.each(relateInput, function(index, val){
      var refRow = $(val).data('lotbet-row');
      var inpRow = $('input.input.lotnum._' + refRow).get(0);  
      var crsRow = $('input[type="checkbox"].lotbet_cross._' + refRow).get(0);  
      var r = $.trim($(inpRow).val());
      var v = $.trim($(val).val());
      if(v.length == 0 || r.length == 0 || $(val).is(':disabled'))
        return true;
      v = v.replace(/,/g, "");
      sumValue += (parseInt(v, 10) * calLotbetCross(crsRow));
    });
    sumValue = addNumberComma(sumValue);
    $('.lotbet-col-sum.' + refCol).text(sumValue);
    calLotBetSum();
  }

  function calLotbetCross($el){
    if(void 0 === $el || !$($el).is(':checked') || $($el).is(':disabled'))
      return 1;
    else{
      var val = $($el).data('cross-value');
      return parseInt(val, 10);
    }
  }

  function calLotBetSum(){
    var sumElement = $('.lotbet-col-sum').not('.total');
    var sum = 0;
    $.each(sumElement, function(index, val){
        var v = $.trim($(val).text());
        if(v.length == 0)
            return true;
        v = v.replace(/,/g, "");
        sum += parseInt(v, 10);
    });
    sum = addNumberComma(sum);
    $('.lotbet-col-sum.total .tt').text(sum);
  }
});