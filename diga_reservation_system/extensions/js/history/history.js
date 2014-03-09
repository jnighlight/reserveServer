function checkoutHistoryExpand()
{
  $("div.checkout_history_date").click(function(){

    info_block = $(this).attr("id").replace("checkout_history_date","checkout_history_info");
    info_block = "#"+info_block;

    $(info_block).toggle();

    
  });
}

function checkinHistoryExpand()
{
  $("div.checkin_history_date").click(function(){


    info_block = $(this).attr("id").replace("checkin_history_date","checkin_history_info");
    info_block = "#"+info_block;

    $(info_block).toggle();


  });
}


$(document).ready(function(){
  checkoutHistoryExpand();
  checkinHistoryExpand();
});

