SELECT department_id
FROM evaluations
GROUP BY department_id
HAVING MAX(CASE WHEN gender = true THEN value ELSE 0 END) > 5
   AND MIN(CASE WHEN gender = true THEN value ELSE 10 END) > 5;
