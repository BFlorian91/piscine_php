SELECT `name`
from distrib
WHERE id_distrib IN (42, 62, 63, 64, 65, 66, 67, 68, 69, 71, 88, 89, 90)
OR (`name` REGEXP '[y|Y\].*[y|Y]' AND `name` REGEXP '[y|Y].*[y|Y].*[y|Y]' = 0)
LIMIT 2,5;