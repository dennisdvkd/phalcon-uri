CREATE TABLE [short_url] (
  [id] INTEGER  NOT NULL PRIMARY KEY,
  [uri] text  UNIQUE NOT NULL,
  [short] VARCHAR(45)  UNIQUE NOT NULL,
  [description] text DEFAULT 'null' NULL,
  [added] TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  [lastaccess] timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL
)