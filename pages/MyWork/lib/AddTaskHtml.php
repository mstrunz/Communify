<div class="span1 tools">
<a href="index.php?page=1" class='btn btn-large btn-inverse'><i class="icon-arrow-left icon-white"></i></a>
</div>
<div class="span11">
<h1>Add Task</h1>

<form action="index.php?page=1&action=addnewTask" method="post">
<label for="name">Task Name</label>
<input type="text" name="name" id="name" />

<label for="description">Description</label>
<textarea rows="3" cols="10" name="description" id="description" ></textarea>

<label for="assignedto">Assigned to</label>
<input type="text" name="assignedto" id="assignedto" />


<label for="duedate">Due Date</label>
<input type="text" name="duedate" id="duedate" />

<label for="duedate">Communify Coins</label>
<input type="text" name="coins" id="coins" />
<br />

<input type='submit' value='Create Task' class='btn btn-inverse'/>
</form>
</div>


<script type="text/javascript">

$(function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
    $('#duedate').datepicker({ dateFormat: 'dd.mm.yy' });

	$( "#assignedto" )
    // don't navigate away from the field on tab when selecting an item
    .bind( "keydown", function( event ) {
      if ( event.keyCode === $.ui.keyCode.TAB &&
          $( this ).data( "ui-autocomplete" ).menu.active ) {
        event.preventDefault();
      }
    })
    .autocomplete({
      source: function( request, response ) {
        $.getJSON( "ajax.php?page=1&action=getUser", {
          term: extractLast( request.term )
        }, response );
      },
      search: function() {
        // custom minLength
        var term = extractLast( this.value );
        if ( term.length < 2 ) {
          return false;
        }
      },
      focus: function() {
        // prevent value inserted on focus
        return false;
      },
      select: function( event, ui ) {
        var terms = split( this.value );
        // remove the current input
        terms.pop();
        // add the selected item
        terms.push( ui.item.value );
        // add placeholder to get the comma-and-space at the end
        terms.push( "" );
        this.value = terms.join( ", " );
        return false;
      }
    });
});
	
</script>