
<!-- TESTING OUT SOME JAVASCRIPT -->
			<!-- https://stackoverflow.com/questions/688196/how-to-use-a-link-to-call-javascript -->
			<script>
			// if cat has default.jpg - cannot delete and redisplay
			function testfunction() {
				if(<?php $cat_table['file_path'] !== 'default.jpg' ?>) {
					alert("Well hello There");
				}
			}
			</script>

      https://www.youtube.com/watch?v=kEf1xSwX5D8 - favicon

      <td><a class="action" href="<?php echo url_for('cats/delete.php?id=' . htmlspecialchars(urlencode($cat_table['id']))); ?>">Delete</a></td>


      <!-- rickroll link -->
<a href="<?php echo url_for('/rickroll.html') ?>">Don't Click Me!</a>

@font-face {
  font-family: 'the-bold-font', sans-serif;
  src: url(/../fonts/the-bold-font/theboldfont.ttf);
}

`    <!-- REMOVED TO REPLACE WITH A LOOP... CONSIDER IF I WANT THE LOOP IN MY FINAL PROJECT_PATH -->
    <dt>Position</dt>
    <dd>
      <select name="position">
        <option value="1"<?php if ($cat['position'] == "1") {echo " selected"; } ?>>1</option>
      </select>

https://developer.mozilla.org/en-US/docs/Learn/HTML/Forms/Your_first_HTML_form

https://stackoverflow.com/questions/18851684/how-do-i-validate-this-html-javascript-form-onsubmit
