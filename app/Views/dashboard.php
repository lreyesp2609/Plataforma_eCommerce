<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Minimalista</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f8f9fa;
            color: #2d3436;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #2d3436;
        }

        .btn-generate {
            background: #2d3436;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-generate:hover {
            background: #636e72;
            transform: translateY(-2px);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            border-left: 4px solid;
            transition: all 0.3s;
        }

        .stat-card:hover {
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }

        .stat-card.slate { border-left-color: #636e72; }
        .stat-card.sage { border-left-color: #6c7a89; }
        .stat-card.stone { border-left-color: #95a5a6; }
        .stat-card.warm { border-left-color: #a29bfe; }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .stat-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #636e72;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 600;
            color: #2d3436;
        }

        .stat-icon {
            font-size: 28px;
            color: #dfe6e9;
        }

        .progress-wrapper {
            margin-top: 12px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .progress-bar-container {
            width: 100%;
            height: 6px;
            background: #f1f3f5;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            background: #95a5a6;
            border-radius: 3px;
            transition: width 0.3s;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #2d3436;
        }

        .dropdown-btn {
            background: none;
            border: none;
            color: #b2bec3;
            cursor: pointer;
            padding: 5px;
        }

        .chart-placeholder {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b2bec3;
        }

        .legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #636e72;
        }

        .legend-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .legend-dot.slate { background: #636e72; }
        .legend-dot.sage { background: #6c7a89; }
        .legend-dot.stone { background: #95a5a6; }

        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .project-item {
            margin-bottom: 20px;
        }

        .project-item:last-child {
            margin-bottom: 0;
        }

        .project-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .project-name {
            font-size: 13px;
            font-weight: 500;
            color: #2d3436;
        }

        .project-percent {
            font-size: 13px;
            color: #636e72;
        }

        .color-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .color-card {
            padding: 16px;
            border-radius: 8px;
            color: white;
            font-size: 14px;
            font-weight: 500;
        }

        .color-card small {
            display: block;
            margin-top: 4px;
            opacity: 0.8;
            font-size: 11px;
        }

        .color-slate { background: #636e72; }
        .color-sage { background: #6c7a89; }
        .color-stone { background: #95a5a6; }
        .color-warm { background: #a29bfe; }
        .color-muted { background: #b2bec3; }
        .color-ash { background: #2d3436; }

        @media (max-width: 968px) {
            .charts-grid,
            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Dashboard</h1>
            <button class="btn-generate">
                <i class="fas fa-download"></i>
                Generate Report
            </button>
        </div>

        <div class="stats-grid">
            <div class="stat-card slate">
                <div class="stat-header">
                    <div>
                        <div class="stat-label">Earnings (Monthly)</div>
                        <div class="stat-value">$40,000</div>
                    </div>
                    <i class="fas fa-calendar stat-icon"></i>
                </div>
            </div>

            <div class="stat-card sage">
                <div class="stat-header">
                    <div>
                        <div class="stat-label">Earnings (Annual)</div>
                        <div class="stat-value">$215,000</div>
                    </div>
                    <i class="fas fa-dollar-sign stat-icon"></i>
                </div>
            </div>

            <div class="stat-card stone">
                <div class="stat-header">
                    <div style="flex: 1;">
                        <div class="stat-label">Tasks</div>
                        <div class="progress-wrapper">
                            <div class="progress-info">
                                <div class="stat-value" style="font-size: 24px;">50%</div>
                            </div>
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" style="width: 50%; background: #95a5a6;"></div>
                            </div>
                        </div>
                    </div>
                    <i class="fas fa-clipboard-list stat-icon"></i>
                </div>
            </div>

            <div class="stat-card warm">
                <div class="stat-header">
                    <div>
                        <div class="stat-label">Pending Requests</div>
                        <div class="stat-value">18</div>
                    </div>
                    <i class="fas fa-comments stat-icon"></i>
                </div>
            </div>
        </div>

        <div class="charts-grid">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Earnings Overview</h6>
                    <button class="dropdown-btn">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
                <div class="chart-placeholder">
                    <i class="fas fa-chart-area fa-3x"></i>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Revenue Sources</h6>
                    <button class="dropdown-btn">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
                <div class="chart-placeholder" style="height: 250px;">
                    <i class="fas fa-chart-pie fa-3x"></i>
                </div>
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-dot slate"></div>
                        <span>Direct</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-dot sage"></div>
                        <span>Social</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-dot stone"></div>
                        <span>Referral</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-grid">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Projects</h6>
                </div>
                <div class="project-item">
                    <div class="project-header">
                        <span class="project-name">Server Migration</span>
                        <span class="project-percent">20%</span>
                    </div>
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" style="width: 20%; background: #a29bfe;"></div>
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-header">
                        <span class="project-name">Sales Tracking</span>
                        <span class="project-percent">40%</span>
                    </div>
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" style="width: 40%; background: #b2bec3;"></div>
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-header">
                        <span class="project-name">Customer Database</span>
                        <span class="project-percent">60%</span>
                    </div>
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" style="width: 60%; background: #95a5a6;"></div>
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-header">
                        <span class="project-name">Payout Details</span>
                        <span class="project-percent">80%</span>
                    </div>
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" style="width: 80%; background: #6c7a89;"></div>
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-header">
                        <span class="project-name">Account Setup</span>
                        <span class="project-percent">Complete!</span>
                    </div>
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" style="width: 100%; background: #636e72;"></div>
                    </div>
                </div>

                <div class="color-grid">
                    <div class="color-card color-slate">
                        Slate
                        <small>#636e72</small>
                    </div>
                    <div class="color-card color-sage">
                        Sage
                        <small>#6c7a89</small>
                    </div>
                    <div class="color-card color-stone">
                        Stone
                        <small>#95a5a6</small>
                    </div>
                    <div class="color-card color-warm">
                        Warm
                        <small>#a29bfe</small>
                    </div>
                    <div class="color-card color-muted">
                        Muted
                        <small>#b2bec3</small>
                    </div>
                    <div class="color-card color-ash">
                        Ash
                        <small>#2d3436</small>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Development Approach</h6>
                </div>
                <p style="color: #636e72; line-height: 1.6; margin-bottom: 16px;">
                    Este dashboard utiliza una paleta de colores minimalista moderna con tonos neutros y suaves que proporcionan una experiencia visual elegante y profesional.
                </p>
                <p style="color: #636e72; line-height: 1.6;">
                    Los colores están cuidadosamente seleccionados para mantener la legibilidad y crear una jerarquía visual clara sin ser demasiado vibrantes.
                </p>
            </div>
        </div>
    </div>
</body>
</html>