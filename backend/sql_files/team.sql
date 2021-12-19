CREATE TABLE IF NOT EXISTS friends(
  id int AUTO_INCREMENT PRIMARY KEY,
  user_id int,
  friend_id int,
  time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)

