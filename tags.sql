SELECT g.id, g.name
FROM goods g
WHERE NOT EXISTS (
  SELECT t.id
  FROM tags t
  WHERE NOT EXISTS (
    SELECT 1
    FROM goods_tags gt
    WHERE gt.tag_id = t.id AND gt.goods_id = g.id
  )
);
