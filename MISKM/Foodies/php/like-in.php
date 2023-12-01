<?php
class likein{
/**
   * いいねを新しく追加する
   * @param string $userId
   * @param int $bookId
   * @return void
   */
  public function insert($userId, $bookId) {
    // SQLの準備
    $sql = sprintf(
      "INSERT INTO %s (%s, %s) VALUES (:book_id, :user_id)",
      self::TABLE_NAME,
      self::BOOK_ID_COLUMN_NAME,
      self::USER_ID_COLUMN_NAME
    );

    // SQLの実行
    $stmt = self::$pdo->prepare($sql);
    $stmt->bindValue(':book_id', $bookId, PDO::PARAM_INT);
    $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
    $stmt->execute();
  }

  /**
   * 指定したユーザーが、指定した本をいいね済みかどうかを判定する
   * @param int $userId
   * @param int $bookId
   * @return bool
   */
  public function isExist($userId, $bookId) {
    // SQLの準備
    $sql = sprintf(
      "SELECT * FROM %s WHERE %s = :user_id AND %s = :book_id",
      self::TABLE_NAME,
      self::USER_ID_COLUMN_NAME,
      self::BOOK_ID_COLUMN_NAME
    );

    // SQLの実行
    $stmt = self::$pdo->prepare($sql);
    $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
    $stmt->bindValue(':book_id', $bookId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // いいね情報が存在するかどうかで判定する
    return !empty($result);
  }