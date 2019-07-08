<?php

SELECT `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.idStatoPat2, statipatologici.nome, `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.specie, Avg(1-ABS(`Sottoquery Patologia Segni riscontrati unito Segni Teorici`.grado_freq-`Sottoquery Patologia Segni riscontrati unito Segni Teorici`. prob)) AS Probabilità FROM (
  select * from (
    select * from (
      SELECT DISTINCT p1.specie, p1.idStatoPat1, p1.idSegno, p1.prob, p1.idStatoPat2, IFNULL(p2.gradoFrequenza,0) AS grado_freq FROM (
        SELECT s2.specie, s2.idStatoPat1, s2.idSegno, s2.prob, p3.idStatoPat2 FROM (
          SELECT s.specie, s.idStatoPat AS idStatoPat1, s.idSegno, s.prob FROM (
            SELECT p.idStatoPat, p.specie, p.idSegno, p.gradoFrequenza, (sep.percentuale/100) AS prob FROM (segnipresenti AS sep INNER JOIN schedechiamate AS sc ON sep.idScheda = sc.idScheda) INNER JOIN presentazioni AS p ON (p.idSegno=sep.idSegno) AND (p.specie = sc.specie) WHERE sep.idScheda = 2
          ) AS s
        )  AS s2 INNER JOIN (SELECT specie, idStatoPat AS idStatoPat2 FROM presentazioni)  AS p3 ON s2.specie = p3.specie
      )  AS p1 LEFT JOIN presentazioni AS p2 ON (p1.idStatoPat2 = p2.idStatoPat) AND (p1.idSegno = p2.idSegno) AND (p1.specie = p2.specie)
    ) AS `Sottoquery Patologia Segni riscontrati` UNION (
                                                          select * from (
                                                            select p2.specie, p1.idStatoPat1, p2.idSegno, IFNULL(p1.prob, 0), p2.idStatoPat, IFNULL(p2.gradoFrequenza, 0) as grado_freq from (
                                                              select * from (
                                                                SELECT DISTINCT p1.specie, p1.idStatoPat1, p1.idSegno, p1.prob, p1.idStatoPat2, IFNULL(p2.gradoFrequenza,0) AS grado_freq FROM (
                                                                  SELECT s2.specie, s2.idStatoPat1, s2.idSegno, s2.prob, p3.idStatoPat2 FROM (
                                                                    SELECT s.specie, s.idStatoPat AS idStatoPat1, s.idSegno, s.prob FROM (
                                                                      SELECT p.idStatoPat, p.specie, p.idSegno, p.gradoFrequenza, (sep.percentuale/100) AS prob FROM (segnipresenti AS sep INNER JOIN schedechiamate AS sc ON sep.idScheda = sc.idScheda) INNER JOIN presentazioni AS p ON (p.idSegno=sep.idSegno) AND (p.specie = sc.specie) WHERE sep.idScheda = 2
                                                                      ) AS s
                                                                    )  AS s2 INNER JOIN (
                                                                          SELECT specie, idStatoPat AS idStatoPat2 FROM presentazioni
                                                                        )  AS p3 ON s2.specie = p3.specie)  AS p1 LEFT JOIN presentazioni AS p2 ON (p1.idStatoPat2 = p2.idStatoPat) AND (p1.idSegno = p2.idSegno) AND (p1.specie = p2.specie)

                                                              ) AS p1 right join presentazioni p2 on (p1.idStatoPat2 = p2.idStatoPat and p1.idSegno = p2.idSegno and p1.specie = p2.specie)
                                                            ) as z ORDER BY `Sottoquery Patologia Segni riscontrati`.idStatoPat2
                                                          ) as `Sottoquery Patologia Segni teorici`
                                                        ) `Sottoquery Patologia Segni teorici2`
  ) as `Sottoquery Patologia Segni riscontrati unito Segni Teoricia`
) as `Sottoquery Patologia Segni riscontrati unito Segni Teorici`
INNER JOIN statipatologici ON `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.idStatoPat2=statipatologici.idStatoPat GROUP BY `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.idStatoPat2, `Sottoquery Patologia Segni riscontrati unito Segni Teorici`.specie, statipatologici.nome ORDER BY Avg(1-ABS(`Sottoquery Patologia Segni riscontrati unito Segni Teorici`.grado_freq-`Sottoquery Patologia Segni riscontrati unito Segni Teorici`.prob)) DESC;



 SELECT   SUM(`quant`), MONTH(`date`) AS month, `id`
 FROM     (

          (SELECT `date`, `id`, count(`hit`) AS `quant`
            FROM   `stat_2014_07`
            WHERE  `k_id` = '123') t1
           UNION ALL (
                      SELECT `date`, `id`, count(`hit`) AS `quant` FROM   `stat_2014_08`  WHERE  `k_id ` = '123'
                     ) t2
          ) t_union
 GROUP BY id, month


?>
