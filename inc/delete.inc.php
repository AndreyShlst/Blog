<?php
//�������� id ��������� ������
$delete_note_id = (int)$_GET["id"];

//���������� ����������� ������ �� ����� ��������.
$config = parse_ini_file("config.inc.ini");
//����������� � ��
$db = new PDO($config["db.conn"],$config["db.user"],$config["db.password"]);
//��������� ������ �� ��������� ������ ���� ������
$query_delete_data = "DELETE FROM news
                      WHERE id = :id";
//�������������� ���
$stmt_delete = $db->prepare($query_delete_data);
//����������� ��������� � �������������
$stmt_delete->bindParam(':id', $delete_note_id);
//���������
$stmt_delete->execute();
//��������� ����������
$db = null;

header("Location: ".$_SERVER['PHP_SELF']);