<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Wingo Mystic Jewel - VIP Prediction Engine</title>
    <meta name="description" content="Access the Mystic Jewel VIP prediction engine with automatic and manual analysis tools. Get elite, real-time Wingo predictions for users in Pakistan and India.">
    <meta name="keywords" content="wingo predictor, manual analysis, color prediction, gaming analysis, FatimaMods, online gaming tool, VIP gaming, India, Pakistan, UID login, whatsapp channel">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4169E1; --secondary-color: #C71585; --accent-color: #FFBF00; --background-color: #121212; --card-background: rgba(25, 25, 40, 0.7);
            --text-primary: #FFFFFF; --text-secondary: #b0c4de; --border-color: rgba(65, 105, 225, 0.3); --success-color: #32CD32; --danger-color: #DC143C; --matrix-color: #00FF41;
            --color-red: #DC143C; --color-green: #32CD32; --color-big: #4169E1; --color-small: #C71585;
        }
        @property --angle { syntax: '<angle>'; initial-value: 0deg; inherits: false; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: var(--background-color); color: var(--text-primary); min-height: 100vh; line-height: 1.6; overflow-x: hidden; position: relative; }
        body::before { content: ''; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-image: url('https://www.transparenttextures.com/patterns/mandala.png'); background-size: 500px; opacity: 0.05; z-index: -2; animation: rotateBg 120s linear infinite; }
        @keyframes rotateBg { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        .login-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 100; display: flex; align-items: center; justify-content: center; background: rgba(18, 18, 18, 0.8); backdrop-filter: blur(10px); transition: opacity 0.5s ease-out; }
        .login-box { background: var(--card-background); padding: 2.5rem; border-radius: 20px; border: 1px solid var(--border-color); text-align: center; width: 90%; max-width: 450px; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37); }
        .notice-box { background: rgba(255, 191, 0, 0.1); border: 1px solid var(--accent-color); border-radius: 10px; padding: 1rem; margin-bottom: 2rem; text-align: left; }
        .notice-box p { margin: 0; font-size: 0.9rem; } .notice-box a { color: var(--accent-color); font-weight: 700; text-decoration: none; } .notice-box hr { border: 0; border-top: 1px solid var(--border-color); margin: 0.75rem 0; }
        .login-box h2 { font-family: 'Playfair Display', serif; margin-bottom: 1.5rem; font-size: 1.8rem; }
        #uidInput { width: 100%; padding: 1rem; font-size: 1rem; border: 1px solid var(--border-color); border-radius: 10px; background: rgba(0,0,0,0.3); color: var(--text-primary); text-align: center; margin-bottom: 1.5rem; }
        #loginButton { width: 100%; padding: 1rem; font-size: 1.1rem; font-weight: 700; border: none; border-radius: 10px; background-color: var(--primary-color); color: var(--text-primary); cursor: pointer; transition: background-color 0.3s ease; }
        #loginButton:hover { background-color: var(--secondary-color); }
        .main-container { max-width: 900px; width: 95%; margin: 2rem auto; background: var(--card-background); border-radius: 20px; box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37); backdrop-filter: blur(12px); border: 1px solid var(--border-color); padding: clamp(1.5rem, 5vw, 2.5rem); display: flex; flex-direction: column; gap: 2.5rem; transition: opacity 0.5s ease-in; }
        .hidden { opacity: 0; pointer-events: none; }
        header { text-align: center; border-bottom: 1px solid var(--border-color); padding-bottom: 1.5rem; }
        .header-title { font-family: 'Playfair Display', serif; font-size: clamp(2rem, 6vw, 2.5rem); background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color)); -webkit-background-clip: text; background-clip: text; color: transparent; animation: gradient-text 5s ease infinite; background-size: 200% 200%; }
        #welcomeUid { font-size: 0.9rem; color: var(--text-secondary); margin-top: 0.5rem; display: block; }
        @keyframes gradient-text { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .control-panel { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .selection-box label { display: block; margin-bottom: 0.5rem; color: var(--text-secondary); font-weight: 600; }
        .selection-box select { width: 100%; padding: 0.8rem; background: rgba(0,0,0,0.3); color: var(--text-primary); border: 1px solid var(--border-color); border-radius: 10px; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; }
        .selection-box select:hover { border-color: var(--accent-color); }
        .live-status { display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 15px; }
        .status-item { border-right: 1px solid var(--border-color); } .status-item:last-child { border-right: none; }
        .status-label { font-size: 0.9rem; color: var(--text-secondary); margin-bottom: 0.25rem; } .status-value { font-size: 1.2rem; font-weight: 700; color: var(--accent-color); }
        .prediction-display { text-align: center; padding: 2rem; border-radius: 15px; position: relative; background: var(--card-background); isolation: isolate; overflow: hidden; }
        .prediction-display::before { content: ''; position: absolute; inset: -2px; z-index: -1; background: conic-gradient(from var(--angle), var(--primary-color), var(--secondary-color), var(--primary-color)); animation: spin 4s linear infinite; }
        @keyframes spin { to { --angle: 360deg; } }
        .prediction-label { font-size: 1.1rem; color: var(--text-secondary); margin-bottom: 1rem; }
        #predictionResult { font-size: clamp(3rem, 10vw, 4.5rem); font-weight: 700; margin-bottom: 0.5rem; line-height: 1; }
        #predictionProbability { font-size: 1.2rem; color: var(--accent-color); font-weight: 600; }
        .stats-dashboard { display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 1rem; }
        .stat-card { background: rgba(0,0,0,0.2); padding: 1rem; border-radius: 10px; text-align: center; border: 1px solid transparent; transition: all 0.3s ease; }
        .stat-card:hover { transform: translateY(-5px); border-color: var(--border-color); } .stat-card .value { font-size: 1.5rem; font-weight: 700; }
        #winRateValue { color: var(--success-color); } #totalWinsValue { color: var(--primary-color); } #totalLossesValue { color: var(--danger-color); }
        .history-log h3, .matrix-log-section h3, .manual-analyzer h3 { text-align: center; margin-bottom: 1.5rem; font-family: 'Playfair Display', serif; }
        #historyBody { display: flex; flex-direction: column; gap: 0.75rem; max-height: 250px; overflow-y: auto; padding-right: 10px; }
        .history-card { display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 1rem; background: rgba(0,0,0,0.2); border-radius: 8px; border-left: 4px solid var(--border-color); }
        .history-card.WIN { border-left-color: var(--success-color); } .history-card.LOSS { border-left-color: var(--danger-color); }
        .history-status { font-weight: 700; } .WIN .history-status { color: var(--success-color); } .LOSS .history-status { color: var(--danger-color); }
        .matrix-log-section { background: rgba(0,0,0,0.2); padding: 1.5rem; border-radius: 15px; } .matrix-log-section h3 { color: var(--matrix-color); }
        .matrix-log { height: 150px; background: #000; border-radius: 5px; overflow-y: scroll; padding: 0.5rem; font-family: 'Share Tech Mono', monospace; font-size: 0.9rem; color: var(--matrix-color); border: 1px solid rgba(0, 255, 65, 0.2); }
        .log-line { white-space: pre-wrap; animation: fadeIn 0.3s ease; } @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .manual-analyzer { background: rgba(0,0,0,0.2); padding: 1.5rem; border-radius: 15px; border-top: 2px solid var(--accent-color); }
        .manual-controls { display: flex; flex-direction: column; gap: 1.5rem; }
        .manual-input-slots { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; background: rgba(0,0,0,0.3); padding: 1rem; border-radius: 10px; min-height: 60px; }
        .input-slot { width: 80px; height: 40px; border: 2px dashed var(--border-color); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-weight: 700; text-transform: uppercase; transition: all 0.3s ease; }
        .input-slot.filled { border-style: solid; }
        .input-slot[data-value="RED"] { border-color: var(--color-red); background: rgba(220, 20, 60, 0.2); color: var(--color-red); }
        .input-slot[data-value="GREEN"] { border-color: var(--color-green); background: rgba(50, 205, 50, 0.2); color: var(--color-green); }
        .input-slot[data-value="BIG"] { border-color: var(--color-big); background: rgba(65, 105, 225, 0.2); color: var(--color-big); }
        .input-slot[data-value="SMALL"] { border-color: var(--color-small); background: rgba(199, 21, 133, 0.2); color: var(--color-small); }
        .input-palette { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; }
        .palette-btn { padding: 0.5rem 1rem; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; transition: transform 0.2s ease; }
        .palette-btn:hover { transform: scale(1.05); }
        .palette-btn.red { background: var(--color-red); color: white; } .palette-btn.green { background: var(--color-green); color: white; } .palette-btn.big { background: var(--color-big); color: white; } .palette-btn.small { background: var(--color-small); color: white; }
        .manual-actions { display: flex; gap: 1rem; }
        #analyzeButton, #clearManualInputsButton { flex-grow: 1; padding: 0.8rem; font-size: 1rem; font-weight: 700; border: none; border-radius: 10px; cursor: pointer; transition: background-color 0.3s ease; }
        #analyzeButton { background-color: var(--primary-color); color: white; } #clearManualInputsButton { background-color: #444; color: white; }
        #manualResultDisplay { text-align: center; margin-top: 1rem; font-size: 1.5rem; font-weight: 700; color: var(--accent-color); min-height: 30px; }
        .whatsapp-channel-float { position: fixed; bottom: 20px; right: 20px; z-index: 99; width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: var(--text-primary); border-radius: 50%; display: none; align-items: center; justify-content: center; font-size: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.3); text-decoration: none; transition: all 0.3s ease; }
        .whatsapp-channel-float:hover { transform: scale(1.1) rotate(10deg); box-shadow: 0 6px 20px rgba(0,0,0,0.4); }
        @media (max-width: 768px) {
            .control-panel { grid-template-columns: 1fr; } .live-status { grid-template-columns: 1fr; gap: 1rem; }
            .status-item { border-right: none; border-bottom: 1px solid var(--border-color); padding-bottom: 1rem; } .status-item:last-child { border-bottom: none; padding-bottom: 0; }
        }
    </style>
</head>
<body>
    <div id="loginOverlay" class="login-overlay">
        <div class="login-box">
            <div class="notice-box">
                <p><i class="fas fa-star" style="color: var(--accent-color);"></i> <strong>Official Notice:</strong> For best results, use our <a href="https://your-official-game-link.com" target="_blank">Official Partner Link</a>.</p>
                <hr>
                <p><i class="fab fa-whatsapp" style="color: #25D366;"></i> <strong>Updates & Hacks:</strong> Join our <a href="https://whatsapp.com/channel/0029VaY689Y9hXF4K2Hhae2x" target="_blank">WhatsApp Channel</a> for exclusive tricks.</p>
            </div>
            <h2>Access VIP Engine</h2>
            <input type="text" id="uidInput" placeholder="Enter Your Game UID">
            <button id="loginButton">Initialize Connection</button>
        </div>
    </div>
    <div id="appContainer" class="main-container hidden">
        <header><h1 class="header-title">WingoHack Vip Version>> t.me/saradata</h1><span id="welcomeUid"></span></header>
        <section class="control-panel">
            <div class="selection-box"><label for="resultType"><i class="fas fa-dice"></i> Game Type</label><select id="resultType" onchange="resetServerSelection()"><option value="bigsmall">BIG / SMALL</option><option value="redgreen">RED / GREEN</option></select></div>
            <div class="selection-box"><label for="serverSelect"><i class="fas fa-server"></i> Prediction Server</label><select id="serverSelect" onchange="updateServerSelection()"><option value="">Select Server</option><optgroup label="Data-Driven Engines"><option value="fatimavip">FatimaMods VIP</option><option value="guaranteedWin">Guaranteed Win</option></optgroup><optgroup label="Algorithmic Engines"><option value="holo">Holographic Engine</option><option value="fractal">Fractal Analysis</option><option value="chaos">Chaos Theory</option><option value="temporal">Temporal Shift</option></optgroup></select></div>
        </section>
        <section class="live-status"><div class="status-item"><span class="status-label">Period</span><span id="periodValue" class="status-value">Loading...</span></div><div class="status-item"><span class="status-label">Time Left</span><span id="timerValue" class="status-value">00:00</span></div><div class="status-item"><span class="status-label">Last Result</span><span id="lastResultValue" class="status-value">Waiting...</span></div></section>
        <section class="prediction-display"><h2 class="prediction-label">Current Prediction</h2><div id="predictionResult">--</div><div id="predictionProbability">Select a server to begin</div></section>
        <section class="matrix-log-section"><h3>Data Stream Log</h3><div id="matrixLog" class="matrix-log"></div></section>
        <section class="manual-analyzer"><h3><i class="fas fa-calculator"></i> Manual Analysis Engine</h3><div class="manual-controls"><div class="selection-box"><label for="manualEngineSelect">Select Analysis Depth</label><select id="manualEngineSelect"><option value="4">Past 4 Results</option><option value="5">Past 5 Results</option><option value="6">Past 6 Results</option></select></div><div><label>Click buttons to enter past results (oldest to newest):</label><div id="manualInputSlots" class="manual-input-slots"></div></div><div class="input-palette"><button class="palette-btn red" data-value="RED">RED</button><button class="palette-btn green" data-value="GREEN">GREEN</button><button class="palette-btn big" data-value="BIG">BIG</button><button class="palette-btn small" data-value="SMALL">SMALL</button></div><div class="manual-actions"><button id="clearManualInputsButton">Clear</button><button id="analyzeButton">Analyze</button></div><div id="manualResultDisplay"></div></div></section>
        <section class="stats-dashboard"><div class="stat-card"><span class="label">Win Rate</span><span id="winRateValue" class="value">0%</span></div><div class="stat-card"><span class="label">Total Wins</span><span id="totalWinsValue" class="value">0</span></div><div class="stat-card"><span class="label">Total Losses</span><span id="totalLossesValue" class="value">0</span></div></section>
        <section class="history-log"><h3>Prediction History</h3><div id="historyBody"></div></section>
    </div>
    <a href="https://whatsapp.com/channel/0029VaY689Y9hXF4K2Hhae2x" id="whatsappChannelFloat" class="whatsapp-channel-float" target="_blank" title="Join WhatsApp Channel"><i class="fab fa-whatsapp"></i></a>
    <script>
        // DOM References
        const loginOverlay = document.getElementById('loginOverlay'), appContainer = document.getElementById('appContainer'), uidInput = document.getElementById('uidInput'), loginButton = document.getElementById('loginButton'), welcomeUidElement = document.getElementById('welcomeUid'), matrixLog = document.getElementById('matrixLog'), periodElement = document.getElementById('periodValue'), timerElement = document.getElementById('timerValue'), lastResultElement = document.getElementById('lastResultValue'), predictionResultElement = document.getElementById('predictionResult'), predictionProbabilityElement = document.getElementById('predictionProbability'), historyBody = document.getElementById('historyBody'), resultTypeSelect = document.getElementById('resultType'), serverSelect = document.getElementById('serverSelect'), winRateElement = document.getElementById('winRateValue'), totalWinsElement = document.getElementById('totalWinsValue'), totalLossesElement = document.getElementById('totalLossesValue'), whatsappChannelFloat = document.getElementById('whatsappChannelFloat'), manualEngineSelect = document.getElementById('manualEngineSelect'), manualInputSlotsContainer = document.getElementById('manualInputSlots'), paletteButtons = document.querySelectorAll('.palette-btn'), analyzeButton = document.getElementById('analyzeButton'), clearManualInputsButton = document.getElementById('clearManualInputsButton'), manualResultDisplay = document.getElementById('manualResultDisplay');
        // State & Config
        let userUID = null, lastPeriodNumber = null, history = [], pendingResult = null, totalWins = 0, totalLosses = 0, isResultProcessing = false, selectedServer = '', manualInputs = [], currentInputIndex = 0, requiredInputs = 4;
        const MAX_LOG_LINES = 100, logMessages = ["Initiating secure connection...", "Authenticating credentials...", "Accessing data node [IND-73A]...", "Bypassing L3 firewall...", "Analyzing historical patterns...", "Compiling probability matrix...", "Fetching real-time server data...", "Decrypting data packet [PAK-21X]...", "Running predictive algorithm v3.7...", "Cross-referencing trend analysis...", "SYNC: Server time locked.", "QUERY: Last 100 results.", "RESPONSE: Data received.", "CALCULATING: Volatility index...", "Filtering anomalies...", "Finalizing prediction vector..."];
        // Login & Initialization
        function handleLogin() { const uid = uidInput.value.trim(); if (uid.length < 5) { alert("Please enter a valid Game UID (at least 5 characters)."); return; } userUID = uid; loginOverlay.classList.add('hidden'); appContainer.classList.remove('hidden'); whatsappChannelFloat.style.display = 'flex'; welcomeUidElement.textContent = `Connected | UID: ${userUID}`; addToLog(`Connection successful. Welcome, UID: ${userUID}`); startMatrixLog(); initializeAppComponents(); setInterval(updatePeriodAndTimer, 1000); }
        loginButton.addEventListener('click', handleLogin); uidInput.addEventListener('keypress', (e) => e.key === 'Enter' && handleLogin());
        function initializeAppComponents() { renderManualInputSlots(); }
        // Visual Effects
        function addToLog(message) { if (matrixLog.children.length >= MAX_LOG_LINES) matrixLog.removeChild(matrixLog.firstChild); const line = document.createElement('div'); line.className = 'log-line'; line.textContent = `> ${message}`; matrixLog.appendChild(line); matrixLog.scrollTop = matrixLog.scrollHeight; }
        function startMatrixLog() { setInterval(() => addToLog(logMessages[Math.floor(Math.random() * logMessages.length)]), 1500); }
        // Manual Analyzer Logic
        function renderManualInputSlots() { requiredInputs = parseInt(manualEngineSelect.value); manualInputSlotsContainer.innerHTML = ''; for (let i = 0; i < requiredInputs; i++) { const slot = document.createElement('div'); slot.className = 'input-slot'; manualInputSlotsContainer.appendChild(slot); } manualInputs = []; currentInputIndex = 0; manualResultDisplay.textContent = ''; }
        function fillNextSlot(value) { if (currentInputIndex >= requiredInputs) return; const slots = manualInputSlotsContainer.children, currentSlot = slots[currentInputIndex]; currentSlot.textContent = value; currentSlot.dataset.value = value; currentSlot.classList.add('filled'); manualInputs[currentInputIndex] = value; currentInputIndex++; }
        async function performManualAnalysis() { if (currentInputIndex < requiredInputs) { alert(`Please enter all ${requiredInputs} past results.`); return; } manualResultDisplay.textContent = 'Analyzing...'; try { const response = await fetch('api.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ action: 'manual_analyze', inputs: manualInputs }) }); if (!response.ok) throw new Error('Network error'); const result = await response.json(); manualResultDisplay.textContent = `Prediction: ${result.prediction}`; } catch (error) { console.error('Manual Analysis Error:', error); manualResultDisplay.textContent = 'Analysis Failed'; } }
        manualEngineSelect.addEventListener('change', renderManualInputSlots); paletteButtons.forEach(button => button.addEventListener('click', () => fillNextSlot(button.dataset.value))); analyzeButton.addEventListener('click', performManualAnalysis); clearManualInputsButton.addEventListener('click', renderManualInputSlots);
        // Core Automatic Prediction Logic
        function resetServerSelection() { serverSelect.value = ''; selectedServer = ''; predictionResultElement.textContent = '--'; predictionProbabilityElement.textContent = 'Select a server to begin'; }
        function updateServerSelection() { selectedServer = serverSelect.value; if (selectedServer && !isResultProcessing && lastPeriodNumber) generateResult(lastPeriodNumber); else if (!selectedServer) resetServerSelection(); }
        function updatePeriodAndTimer() { const now = new Date(); now.setUTCSeconds(now.getUTCSeconds()); const periodNumber = `${now.getUTCFullYear()}${String(now.getUTCMonth() + 1).padStart(2, '0')}${String(now.getUTCDate()).padStart(2, '0')}1000${10001 + (now.getUTCHours() * 60 + now.getUTCMinutes())}`; if (lastPeriodNumber !== periodNumber) { if (pendingResult && lastPeriodNumber) checkPendingResult(lastPeriodNumber); lastPeriodNumber = periodNumber; periodElement.textContent = periodNumber; if (selectedServer) generateResult(periodNumber); } timerElement.textContent = `00:${String(60 - now.getUTCSeconds()).padStart(2, '0')}`; }
        async function generateResult(period) { if (isResultProcessing || !selectedServer) return; isResultProcessing = true; predictionResultElement.textContent = '...'; predictionProbabilityElement.textContent = 'Analyzing patterns...'; try { const response = await fetch('api.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ server: selectedServer, type: resultTypeSelect.value, period, history }) }); if (!response.ok) throw new Error(`API Error: ${response.status}`); const prediction = await response.json(); predictionResultElement.textContent = prediction.result; predictionProbabilityElement.textContent = prediction.message ? `(${prediction.probability}%) - ${prediction.message}` : `Probability: ${prediction.probability}%`; if (prediction.result !== "Awaiting Signal" && prediction.result !== "No Engine Selected") { history.unshift({ period, result: prediction.result, status: "Pending", probability: prediction.probability }); pendingResult = history[0]; } renderHistory(); } catch (error) { console.error("Error generating result:", error); predictionResultElement.textContent = 'Error'; predictionProbabilityElement.textContent = 'Could not fetch prediction.'; } finally { isResultProcessing = false; } }
        async function fetchGameResult(period) { try { const response = await fetch("api.php", { method: "POST", headers: { "Content-Type": "application/json" }, body: JSON.stringify({ action: 'fetch_result', period }) }); if (!response.ok) return null; return (await response.json()).result; } catch (error) { console.error("Error fetching game result:", error); return null; } }
        async function checkPendingResult(period) { if (!pendingResult || pendingResult.period !== period) return; const apiResult = await fetchGameResult(period); if (apiResult && apiResult.period === period) { const actualGameResult = (resultTypeSelect.value === 'bigsmall') ? apiResult.actualResult : apiResult.colorResult; lastResultElement.textContent = actualGameResult; pendingResult.status = pendingResult.result === actualGameResult ? "WIN" : "LOSS"; if (pendingResult.status === "WIN") totalWins++; else totalLosses++; updateStats(); renderHistory(); pendingResult = null; } }
        // UI Rendering
        function renderHistory() { historyBody.innerHTML = history.slice(0, 5).map(h => `<div class="history-card ${h.status}"><div class="history-info"><span>Period: ${h.period}</span> | <span>Prediction: <strong>${h.result}</strong></span></div><div class="history-status">${h.status}</div></div>`).join(""); }
        function updateStats() { const totalBets = totalWins + totalLosses; const winAccuracy = totalBets === 0 ? 0 : ((totalWins / totalBets) * 100).toFixed(1); winRateElement.textContent = `${winAccuracy}%`; totalWinsElement.textContent = totalWins; totalLossesElement.textContent = totalLosses; }
    </script>
</body>
</html>