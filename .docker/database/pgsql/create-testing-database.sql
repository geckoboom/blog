SELECT 'CREATE DATABASE blog'
    WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'testing')\gexec
SELECT 'CREATE DATABASE blog_testing'
    WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'testing')\gexec
