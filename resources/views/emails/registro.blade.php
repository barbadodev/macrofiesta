<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="margin: 0; padding: 0; background-color: #020617; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #020617; padding: 40px 10px;">
        <tr>
            <td align="center">
                <table width="550" border="0" cellspacing="0" cellpadding="0" style="background-color: #0f172a; border: 1px solid #1e293b; border-radius: 40px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.8);">
                    
                    <tr>
                        <td style="padding: 50px 40px 30px 40px; text-align: center;">
                            <span style="display: inline-block; padding: 6px 15px; border-radius: 50px; background-color: rgba(168, 85, 247, 0.1); border: 1px solid rgba(168, 85, 247, 0.3); color: #a855f7; font-size: 10px; font-weight: bold; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 20px;">
                                Sábado 11 de Abril
                            </span>
                            <h1 style="margin: 0; color: #ffffff; font-size: 42px; font-weight: 900; font-style: italic; text-transform: uppercase; letter-spacing: -2px;">
                                MACRO<span style="color: #a855f7;">FIESTA</span>
                            </h1>
                            <p style="margin: 10px 0 0 0; color: #475569; font-weight: bold; font-size: 10px; text-transform: uppercase; letter-spacing: 4px;">
                                FIESTA 18 TATONA
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 0 45px 40px 45px; color: #ffffff; line-height: 1.6;">
                            <h2 style="color: #a855f7; margin-bottom: 15px; font-size: 20px; font-weight: 800; text-transform: uppercase;">Hola, {{ $cumple->nombre_apellidos }}</h2>
                            
                            <p style="font-size: 15px; color: #94a3b8;">Tu registro para la <strong>MACROFIESTA</strong> ha sido un éxito. Ya tenemos guardada tu bebida favorita ({{ $cumple->bebida_alcoholica }} con {{ $cumple->mezcla }}).</p>
                            
                            <div style="margin: 35px 0; padding: 30px; background-color: #1e293b; border: 1px solid #334155; border-radius: 25px; text-align: center;">
                                <p style="margin: 0; color: #a855f7; font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 3px;">QUEDAN:</p>
                                <p style="margin: 10px 0 0 0; color: #ffffff; font-size: 45px; font-weight: 900; font-style: italic; letter-spacing: -1px;">
                                    {{ \Carbon\Carbon::parse('2026-04-11')->diffInDays(now()) }} DÍAS
                                </p>
                            </div>

                            <p style="font-size: 13px; color: #64748b; font-style: italic; margin-bottom: 5px;">Tu código de acceso personal es: <span style="color: #ec4899; font-weight: bold;">{{ $cumple->token }}</span></p>
                            <p style="font-size: 13px; color: #64748b; font-style: italic;">Muchas gracias por asistir</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 30px; background-color: #020617; border-top: 1px solid #1e293b; text-align: center;">
                            <p style="margin: 0; color: #475569; font-size: 11px; text-transform: uppercase; font-weight: bold;">
                                © 2026 Macrofiesta Tatona
                            </p>
                            <p style="margin: 10px 0 0 0; font-family: monospace; font-size: 12px; color: #475569;">
                                Developed by <span style="color: #a855f7;">@antoniobarbado_, @barbadodev in GitHub</span>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>