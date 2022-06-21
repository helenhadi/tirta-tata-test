-- 1 --------------------------------------------------------------------------------
SELECT 
    kode_baru AS 'Kode Baru',
    (SELECT 
            SUM(b.nominal_transaksi)
        FROM
            tabel_b b
        WHERE
            b.kode_toko = a.kode_baru
                OR b.kode_toko = a.kode_lama) AS 'Nominal Transaksi'
FROM
    tabel_a a
HAVING 'Nominal Transaksi' IS NOT NULL
;
-- 2 --------------------------------------------------------------------------------
SELECT 
    a.kode_baru AS 'Kode Baru'
FROM
    tabel_a a
WHERE
    (SELECT 
            COUNT(*)
        FROM
            tabel_b b
        WHERE
            b.kode_toko = a.kode_baru
                OR b.kode_toko = a.kode_lama) != 0
;
-- 3 --------------------------------------------------------------------------------
SELECT 
    a.kode_baru AS 'Kode Baru',
    (SELECT 
            SUM(b.nominal_transaksi)
        FROM
            tabel_b b
        WHERE
            b.kode_toko = a.kode_baru
                OR b.kode_toko = a.kode_lama) AS 'Nominal Transaksi'
FROM
    tabel_a a
ORDER BY 'Nominal Transaksi' DESC
LIMIT 1
;
-- 4 --------------------------------------------------------------------------------
SELECT 
    c.kode_toko AS 'Kode Toko',
    (SELECT 
            d.nama_sales
        FROM
            tabel_d d
        WHERE
            SUBSTRING(d.kode_sales, 1, 1) = c.area_sales
        ORDER BY d.kode_sales DESC
        LIMIT 1) AS 'Nama Sales'
FROM
    tabel_c c
;
-- 5 --------------------------------------------------------------------------------
SELECT 
    g.nama_sales AS 'Nama Sales', h.jum3 AS 'Nominal Transaksi'
FROM
    (SELECT 
        SUBSTRING(e.kode_sales, 1, 1) AS area, e.nama_sales
    FROM
        tabel_d e
    WHERE
        SUBSTRING(e.kode_sales, 2, 1) = (SELECT 
                MAX(SUBSTRING(d.kode_sales, 2, 1))
            FROM
                tabel_d d
            WHERE
                SUBSTRING(d.kode_sales, 1, 1) = SUBSTRING(e.kode_sales, 1, 1))) g
        INNER JOIN
    (SELECT 
        SUM(e.jum) AS jum3, c.*
    FROM
        (SELECT 
        a.kode_baru,
            (SELECT 
                    SUM(b.nominal_transaksi)
                FROM
                    tabel_b b
                WHERE
                    b.kode_toko = a.kode_baru
                        OR b.kode_toko = a.kode_lama) AS jum
    FROM
        tabel_a a) e
    INNER JOIN tabel_c c ON e.kode_baru = c.kode_toko
    GROUP BY c.area_sales) h ON g.area = h.area_sales
;