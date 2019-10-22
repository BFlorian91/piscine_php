SELECT COUNT(*) as "nb_abo", FLOOR(AVG(price)) as "moy_abo", SUM(duration_sub) % 42 as "ft"
FROM subscription;