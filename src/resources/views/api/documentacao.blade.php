<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>API - Confeitaria DaVilla</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            color: #222;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
        }

        header {
            background: #222;
            color: #fff;
            padding: 32px 20px;
        }

        header .container,
        main {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        header p {
            margin: 0;
            color: #ddd;
        }

        main {
            padding: 32px 20px 48px;
        }

        section {
            background: #fff;
            margin-bottom: 24px;
            padding: 24px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        h2 {
            margin-top: 0;
            font-size: 24px;
        }

        h3 {
            margin-bottom: 8px;
            font-size: 18px;
        }

        p {
            margin-top: 8px;
        }

        .endpoint {
            margin-top: 16px;
            padding: 16px;
            background: #f7f7f7;
            border-left: 4px solid #333;
        }

        .method {
            display: inline-block;
            margin-right: 8px;
            padding: 4px 8px;
            background: #222;
            color: #fff;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
        }

        code {
            font-family: Consolas, Monaco, monospace;
        }

        .url {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background: #eee;
        }

        footer {
            padding: 24px 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>

<body>

<header>
    <div class="container">
        <h1>API - Confeitaria DaVilla</h1>

        <p>
            Documentação da API utilizada pelo aplicativo.
        </p>
    </div>
</header>

<main>

    <section>
        <h2>Sobre a API</h2>

        <p>
            A API da Confeitaria DaVilla disponibiliza informações
            do sistema em formato JSON para aplicativos e outros sistemas.
        </p>

        <p>
            A versão atual da API utiliza o prefixo
            <code>/api/v1</code>.
        </p>
    </section>

    <section>
        <h2>Endpoints</h2>

        <div class="endpoint">
            <h3>Status</h3>

            <p>
                <span class="method">GET</span>
                <code class="url">/api/v1/status</code>
            </p>

            <p>
                Retorna o status atual da API.
            </p>
        </div>

        <div class="endpoint">
            <h3>Banners</h3>

            <p>
                <span class="method">GET</span>
                <code class="url">/api/v1/banners</code>
            </p>

            <p>
                Retorna os banners disponíveis.
            </p>
        </div>

        <div class="endpoint">
            <h3>Categorias</h3>

            <p>
                <span class="method">GET</span>
                <code class="url">/api/v1/categorias</code>
            </p>

            <p>
                Retorna as categorias disponíveis.
            </p>
        </div>

        <div class="endpoint">
            <h3>Produtos por categoria</h3>

            <p>
                <span class="method">GET</span>
                <code class="url">/api/v1/categorias/{id}</code>
            </p>

            <p>
                Retorna os produtos relacionados à categoria informada.
            </p>
        </div>

        <div class="endpoint">
            <h3>Produtos</h3>

            <p>
                <span class="method">GET</span>
                <code class="url">/api/v1/produtos</code>
            </p>

            <p>
                Retorna os produtos disponíveis.
            </p>
        </div>

        <div class="endpoint">
            <h3>Produto</h3>

            <p>
                <span class="method">GET</span>
                <code class="url">/api/v1/produtos/{slug}</code>
            </p>

            <p>
                Retorna um produto específico pelo seu slug.
            </p>
        </div>
    </section>

    <section>
        <h2>API e documentação Web</h2>

        <table>
            <thead>
                <tr>
                    <th>Fluxo</th>
                    <th>Exemplo</th>
                    <th>Resposta</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>API</td>
                    <td><code>/api/v1/produtos</code></td>
                    <td>JSON para aplicativo ou outro sistema</td>
                </tr>

                <tr>
                    <td>WEB</td>
                    <td><code>/api/documentacao</code></td>
                    <td>HTML gerado por Blade para leitura humana</td>
                </tr>
            </tbody>
        </table>
    </section>

</main>

<footer>
    Confeitaria DaVilla - Documentação da API
</footer>

</body>
</html>
