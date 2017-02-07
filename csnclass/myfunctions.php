<?php
function generate_textbox($name, $value) {
 return '<input type="text" name="' . $name . '" value="' . $value . '">';
}
function generate_submit($name, $value) {
 return '<input type="submit" name="' . $name . '" value="' . $value . '">';
}
function generate_password($name, $value) {
 return '<input type="password" name="' . $name . '" value="' . $value . '">';
}
function generate_textarea($name, $value) {
 return '<textarea name="' . $name . '">' . $value . '</textarea>';
}
function generate_checkbox($name, $value, $checked) {
if ($checked)
$checked = 'checked=checked';
else
$checked = '';
 return "<input type=\"checkbox\" name=\"$name\" value=\"$value\" $checked />";
}
function generate_dropdown($name, $currentvalue, $values, $withempty=false) {
$html = "<select name=\"$name\" >";
if ($withempty)
$html .= '<option value=""> </option>';
foreach ($values as $key => $caption) {
$selected = ($key == $currentvalue) ? 'selected=selected' : '';
$html .= "<option value=\"$key\" $selected>$caption</option>";
}
$html .= '</select>';
return $html;
}
function getFromPOST($name, $value) {
return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $value;
}
function displaystudentinfo($handle, $sn) {
$sn = mysql_real_escape_string($sn);
$sql = "SELECT SN, Name, College, Course, Year
 FROM students
 WHERE SN = '$sn'";
$result = @mysql_query($sql,$handle);
if ($result) {
$record = mysql_fetch_array($result,MYSQL_ASSOC);
echo '<h2>Student Info</h2>';
echo "<table border=1 width=100%>";
echo "<tr><td>SN</td><td>{$record['SN']}</td></tr>";
echo "<tr><td>Name</td><td>{$record['Name']}</td></tr>";
echo "<tr><td>College</td><td>{$record['College']}</td></tr>";
echo "<tr><td>Course</td><td>{$record['Course']}</td></tr>";
echo "<tr><td>Year</td><td>{$record['Year']}</td></tr>";
@mysql_free_result($result);
return true;
}
else {
if(PRODUCTION){
echo 'Unable to query database!';
}
else{
echo 'ERROR:',mysql_error();
}
}
}
function displaystudentgrades($handle, $mode, $sn, $validgrades) {
$sn = mysql_real_escape_string($sn);
$sql = "SELECT SS.RecordID, SS.SN, Semester, SS.SubjectCode, Description, Units, Grade
FROM studentsubjects SS
INNER JOIN subjectmasterfile SM ON SM.subjectcode = SS.subjectcode
WHERE SN = '$sn'
ORDER BY Semester, Description";
$result = @mysql_query($sql,$handle);
if ($result) {
$semester = '';
echo '<table border=1 width=100%>';
echo '<tr>';
echo '<th>No.</th>';
echo '<th>Subject</th>';
echo '<th>Description</th>';
echo '<th>Units</th>';
echo '<th>Grades</th>';
if ($mode == 'edit') {
echo '<th>New</th>';
echo '<th>Delete</th>';
}
echo '</tr>';
$ctr = 1;
if ($mode == 'edit')
echo '<h2>Edit Grades</h2>';
else
echo '<h2>Grades Viewer</h2>';
while ($record = mysql_fetch_array($result,MYSQL_ASSOC) )  {
if ($semester != $record['Semester']) {
if ($semester != '')
echo "</tr>";
if($mode=='edit'){
echo "<tr><td colspan=7><strong>Semester:{$record['Semester']}</strong></t>";
}
else{
    echo "<tr><td colspan=5><strong>Semester:{$record['Semester']}</strong></t>";
}
$semester = $record['Semester'];
}
echo '<tr>';
echo '<td>',$ctr++, '</td>';
echo '<td>',$record['SubjectCode'], '</td>';
echo '<td>',$record['Description'], '</td>';
echo '<td>',$record['Units'], '</td>';
echo '<td>',$record['Grade'], '</td>';
if ($mode == 'edit') {
$fieldname = urlencode("GRADE;{$record['RecordID']}");
$value = getFromPOST($fieldname, $record['Grade']);
echo '<td>',generate_dropdown($fieldname,$value,$validgrades,true),'</td>';
$value = $record['RecordID'];
echo '<td>',generate_checkbox(K_SELECTED.'[]',$value, false),'</td>';
}
echo '</tr>';
}
echo '</table><br />';
if (($mode=='edit') && ($ctr > 0)) {
    echo generate_submit(K_UPDATE,'Update Grades'), ' ';
    echo generate_submit(K_DELETE,'Delete Selected'), '<br /><br />';
}
@mysql_free_result($result);
return true;
}
else {
if(PRODUCTION){
echo 'Unable to query database!';
}
else{
echo 'ERROR:',mysql_error();
}
}
}
function updatestudentgrades($handle) {
 $updated = 0;
 foreach ($_POST as $name => $value) {
 $fieldname = urldecode($name);
 $fields = explode(';',$fieldname);
 if ((count($fields) == 2) && ($fields[0] == 'GRADE')) {
 $sql = "UPDATE studentsubjects
 SET Grade = '$value'
 WHERE RecordID = {$fields[1]} AND
 Grade <> '$value'";
 if ( @mysql_query($sql, $handle) )
 $updated += @mysql_affected_rows($handle);
 }
 }
 echo "<h4>UPDATE GRADES: $updated record(s) affected</h4>";
}
function deleteselected($handle) {
$deleted = 0;
foreach ($_POST[K_SELECTED] as $value) {
$sql = "DELETE FROM studentsubjects
WHERE RecordID = $value";
if (@mysql_query($sql, $handle))
$deleted += @mysql_affected_rows($handle);
}
echo "<h4>DELETE GRADES: $deleted record(s) affected</h4>";
}
function savenewrecord($handle, $sn) {
$sn = mysql_escape_string($sn);
$semester = getFromPOST(K_SEMESTER,'');
$subjectcode = getFromPOST(K_SUBJECTCODE,'');
$grade = getFromPOST(K_GRADE,'');
if (($subjectcode != '') && ($semester != '')) {
$sql = "INSERT INTO studentsubjects (Semester, SN, SubjectCode, Grade)
 VALUES ('$semester', '$sn', '$subjectcode', '$grade')";
$inserted = 0;
if (@mysql_query($sql,$handle))
$inserted += @mysql_affected_rows($handle);
echo "<h4>NEW RECORD: $inserted record(s) inserted</h4>";
}
}
function displaynewform($handle, $sn, $validgrades) {
$semester = getFromPOST(K_SEMESTER,'20152');
$subjectcode = getFromPOST(K_SUBJECTCODE,'');
$grade = getFromPOST(K_GRADE,'');
$sql = "SELECT SubjectCode, Description, Units
 FROM subjectmasterfile
 ORDER BY description";
$result = @mysql_query($sql,$handle);
if (!$result) {
if(PRODUCTION){
echo 'Unable to query database!';
}
else{
echo 'ERROR:',mysql_error();
}
return false;
}
$subjects = array();
while ($record = mysql_fetch_array($result,MYSQL_ASSOC) ) {
$subjects[$record['SubjectCode']] = "{$record['Description']}
({$record['Units']})";
}
@mysql_free_result($result);
$semesters['20151'] = 'First Semester, S.Y. 2015-2016';
$semesters['20152'] = 'Second Semester, S.Y. 2015-2016';
$semesters['20150'] = 'Summer 2015';
echo "<table border=1 width=100% id=new>";
echo '<tr><th colspan=2>New Record</th></tr>';
echo '<tr><td>Semester</td><td>', generate_dropdown(K_SEMESTER, $semester, $semesters),
'</td></tr>';
echo '<tr><td>Subject</td><td>', generate_dropdown(K_SUBJECTCODE,$subjectcode,
$subjects), '</td></tr>';
echo '<tr><td>Grade</td><td>', generate_dropdown(K_GRADE, $grade, $validgrades,true),
'</td></tr>';
echo '</table><br />';
echo generate_submit(K_SAVE,'Save'), '<br /><br />';
} 
?>