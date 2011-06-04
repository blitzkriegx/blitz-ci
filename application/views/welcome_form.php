<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>

<h5>Username</h5>
<?php echo form_error('username'); ?>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<h5>Password</h5>
<?php echo form_error('password'); ?>
<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<?php echo form_error('passconf'); ?>
<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Email Address</h5>
<?php echo form_error('email'); ?>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<?php echo form_error('options[size]'); ?>
<input type="text" name="options[size]" value="<?php echo set_value("options[size]"); ?>" size="50" /> 

<input type="text" name="colors[]" value="<?php echo set_value('colors[]'); ?>" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

set_select()

If you use a <select> menu, this function permits you to display the menu item that was selected. The first parameter must contain the name of the select menu, the second parameter must contain the value of each item, and the third (optional) parameter lets you set an item as the default (use boolean TRUE/FALSE).

Example:
<select name="myselect">
<option value="one" <?php echo set_select('myselect', 'one', TRUE); ?> >One</option>
<option value="two" <?php echo set_select('myselect', 'two'); ?> >Two</option>
<option value="three" <?php echo set_select('myselect', 'three'); ?> >Three</option>
</select>
set_checkbox()

Permits you to display a checkbox in the state it was submitted. The first parameter must contain the name of the checkbox, the second parameter must contain its value, and the third (optional) parameter lets you set an item as the default (use boolean TRUE/FALSE). Example:
<input type="checkbox" name="mycheck[]" value="1" <?php echo set_checkbox('mycheck[]', '1'); ?> />
<input type="checkbox" name="mycheck[]" value="2" <?php echo set_checkbox('mycheck[]', '2'); ?> />
set_radio()

Permits you to display radio buttons in the state they were submitted. This function is identical to the set_checkbox() function above.
<input type="radio" name="myradio" value="1" <?php echo set_radio('myradio', '1', TRUE); ?> />
<input type="radio" name="myradio" value="2" <?php echo set_radio('myradio', '2'); ?> />

</body>
</html>
