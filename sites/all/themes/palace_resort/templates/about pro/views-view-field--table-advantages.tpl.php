<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php
global $language;
$data = trim(strtolower($output));
if (!empty($output) && $data == 'x' && $language->language == 'en') {
    print '<span class="icon-checkmark"></span>';
} else {
    print '<span>' . $output . '</span>';
}
?>