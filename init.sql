-- Tabloyu oluşturuyoruz
CREATE TABLE IF NOT EXISTS entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    guest_name VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- İlk veriyi ekliyoruz
INSERT INTO entries (guest_name, message) VALUES ('Sistem', 'Ziyaretçi defteri hazir!');