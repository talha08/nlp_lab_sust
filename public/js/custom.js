/**
 * Created by Farhad on 9/18/2017.
 */
var cl = 0;
function virgin() {
    var wrapper = $("#resource");
    if (cl == 0) {
        $(wrapper).append('<div class="form-group">        <label for="resource_link12" class="control-label">Resource Second Url (optional):</label><br/>        <input class="form-control" placeholder="Put resource url here..." name="resource_link2" type="text" value="">            </div><br/>            ')
        cl++;
    }
    else {
        $(wrapper).append('<div class="form-group">        <label for="resource_link3" class="control-label">Resource Third Url (optional):</label><br/>        <input class="form-control" placeholder="Put resource url here..." name="resource_link3" type="text" value="" id="resource_link3">            </div><br/>            ');
        $('#buttId').remove();
    }

}