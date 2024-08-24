<?php
class MemberModel extends Model {
public function get_all_member() {
return mysql()->all("SELECT * FROM member");
}
}
?>