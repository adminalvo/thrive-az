<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
    
    <!-- Radar Section -->
    <div class="admin-card" style="background: #0f172a; color: #fff; text-align: center; border: 1px solid #1e293b; overflow: hidden; position: relative; height: 350px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <h3 style="color: #38bdf8; position: absolute; top: 20px; left: 20px; margin: 0; font-family: monospace; z-index: 10;">THREAT RADAR</h3>
        
        <div style="width: 200px; height: 200px; border-radius: 50%; border: 2px solid #047857; position: relative; display: flex; align-items: center; justify-content: center;">
            <div style="width: 150px; height: 150px; border-radius: 50%; border: 1px solid #059669; position: absolute;"></div>
            <div style="width: 100px; height: 100px; border-radius: 50%; border: 1px dashed #34d399; position: absolute;"></div>
            <div style="width: 50px; height: 50px; border-radius: 50%; border: 1px dotted #10b981; position: absolute;"></div>
            <!-- Radar Scanner -->
            <div class="radar-scan" style="position: absolute; top: 50%; left: 50%; width: 100px; height: 100px; border-radius: 0 100% 0 0; background: conic-gradient(from 0deg, rgba(16, 185, 129, 0) 0deg, rgba(16, 185, 129, 0.4) 90deg); transform-origin: bottom left; animation: scan 4s linear infinite;"></div>
            
            <!-- Blips -->
            <div class="blip" style="position: absolute; top: 30px; left: 140px; width: 8px; height: 8px; border-radius: 50%; background: #ef4444; box-shadow: 0 0 10px #ef4444; animation: blink 2s infinite;"></div>
            <div class="blip" style="position: absolute; top: 120px; left: 40px; width: 6px; height: 6px; border-radius: 50%; background: #f59e0b; box-shadow: 0 0 10px #f59e0b; animation: blink 3s infinite 1s;"></div>
        </div>
    </div>

    <!-- Stats Section -->
    <div style="display: flex; flex-direction: column; gap: 20px;">
        <div class="admin-card" style="background: #0f172a; color: #fff; border: 1px solid #1e293b; padding: 20px; flex: 1; display: flex; align-items: center; justify-content: space-between;">
            <div>
                <p style="color: var(--text-secondary); margin: 0 0 5px; font-family: monospace;">SERVER STATUS</p>
                <h2 style="color: #10b981; margin: 0;">ONLINE</h2>
            </div>
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg>
        </div>
        
        <div class="admin-card" style="background: #0f172a; color: #fff; border: 1px solid #1e293b; padding: 20px; flex: 1; display: flex; align-items: center; justify-content: space-between;">
            <div>
                <p style="color: var(--text-secondary); margin: 0 0 5px; font-family: monospace;">BLOCKED THREATS (24h)</p>
                <h2 id="threatCount" style="color: #ef4444; margin: 0;">1,248</h2>
            </div>
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        </div>
    </div>
</div>

<div class="admin-card" style="margin-top: 20px; background: #0f172a; color: #fff; border: 1px solid #1e293b; overflow: hidden;">
    <h3 style="color: #38bdf8; margin: 0 0 15px; font-family: monospace; border-bottom: 1px solid #1e293b; padding-bottom: 10px;">LIVE SECURITY FEED</h3>
    <div id="securityFeed" style="font-family: monospace; font-size: 0.85rem; height: 250px; overflow-y: hidden; display: flex; flex-direction: column; gap: 8px;">
        <!-- JS will populate -->
    </div>
</div>

<style>
@keyframes scan {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
@keyframes blink {
    0%, 100% { opacity: 0; }
    50% { opacity: 1; }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const feed = document.getElementById('securityFeed');
    const threatCount = document.getElementById('threatCount');
    let count = 1248;

    const ips = ['45.33.2.1', '192.168.1.5', '10.0.0.8', '8.8.8.8', '114.23.5.99', '188.4.5.12'];
    const actions = [
        '[FIREWALL] Blocked SQL Injection attempt',
        '[WAF] Dropped suspicious packet',
        '[AUTH] Multiple failed login attempts (Brute Force blocked)',
        '[DDoS] Mitigated SYN flood ping',
        '[SCAN] Blocked unauthorized port scan'
    ];
    const colors = ['#ef4444', '#f59e0b', '#38bdf8'];

    function addFeedItem() {
        if(feed.children.length > 9) {
            feed.removeChild(feed.lastChild);
        }
        
        const ip = ips[Math.floor(Math.random() * ips.length)];
        const action = actions[Math.floor(Math.random() * actions.length)];
        const color = colors[Math.floor(Math.random() * colors.length)];
        const time = new Date().toLocaleTimeString();

        const el = document.createElement('div');
        el.style.color = '#94a3b8';
        el.innerHTML = `<span style="color: #10b981;">[${time}]</span> <span style="color: ${color}; font-weight: bold;">${ip}</span> - ${action}`;
        
        feed.insertBefore(el, feed.firstChild);

        if(color === '#ef4444') {
            count++;
            threatCount.innerText = count.toLocaleString();
        }
    }

    // Pre-fill
    for(let i=0; i<8; i++) addFeedItem();

    // Loop
    setInterval(addFeedItem, 1500);
});
</script>
